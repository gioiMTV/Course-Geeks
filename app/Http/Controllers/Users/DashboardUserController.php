<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\users\UserModel;
use App\Models\courses\CourseModel;
use App\Models\courses\CourseSectionModel;
use App\Models\courses\CourseLectureModel;
use Illuminate\Support\Facades\DB;
use App\Models\courses\BookmarkModel;
use App\Models\courses\CourseSaleModel;
use App\Models\users\InstructorModel;
use App\Models\users\StudentModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class DashboardUserController extends Controller
{
    public function index()
    {
        $role = session('role');
        // User profile
        $user = Auth::user();
        $userDetail = null; // Khởi tạo biến $userDetail để tránh lỗi không xác định

        if ($role == 0) {
            $bookmarkedCourses = null; // Khởi tạo biến $bookmarkedCourses để tránh l��i không xác đ��nh
            $coursePurchased = null;
            $bookmarkedCourseIds = null;

            if ($user) {
                $user = UserModel::find($user->id);
                if ($user) {
                    $userDetail = $user->student()->first();

                    // Kiểm tra nếu userDetail không tồn tại hoặc avatar chưa được cập nhật
                    if (!$userDetail || !$userDetail->avatar) {
                        $defaultAvatar = 'avatar-00.jpg'; // Đường dẫn tới ảnh đại diện mặc định

                        // Thiết lập avatar mặc định nếu chưa có
                        $userDetail = (object)[
                            'id' => null,
                            'avatar' => $defaultAvatar,
                            'firstname' => $userDetail->firstname ?? 'Default Firstname',
                            'lastname' => $userDetail->lastname ?? 'Default Lastname',
                            'phone' => $userDetail->phone ?? 'Default Phone',
                            'email' => $userDetail->email ?? 'Default email',
                            'birthday' => $userDetail->birthday ?? 'Default birthday',
                            'address' => $userDetail->address ?? 'Default Address',
                        ];
                    }
                }
                if ($userDetail->id) {
                    // Lấy các khóa học đã bookmark của học sinh
                    $bookmarkedCourses = CourseModel::whereHas('bookmark', function ($query) use ($userDetail) {
                        $query->where('student_id', $userDetail->id);
                    })
                        ->withAvg('review', 'rate')
                        ->withCount('review')
                        ->withCount('sale')
                        ->paginate(8);
                    $bookmarkedCourseIds = BookmarkModel::where('student_id', $userDetail->id)
                        ->pluck('course_id')
                        ->toArray();

                    // Lấy các khóa học đã mua của học sinh
                    $coursePurchased = CourseModel::whereHas('sale', function ($query) use ($userDetail) {
                        $query->where('student_id', $userDetail->id);
                    })
                        ->withAvg('review', 'rate')
                        ->withCount('review')
                        ->withCount('sale')
                        ->paginate(8);
                }
            }
            // dd(($bookmarkedCourseIds));

            View::share([
                'user' => $user,
                'userDetail' => $userDetail,
                'bookmarkedCourses' => $bookmarkedCourses,
                'bookmarkedCourseIds' => $bookmarkedCourseIds,
                'coursePurchased' => $coursePurchased,
            ]);

            return view('student.dashboard-student', ['title' => 'Dashboard',]);
        } else if ($role == 1) {
            if ($user) {
                $user = UserModel::find($user->id);

                $revenueByMonth = [];
                $labels = [];
                if ($user) {
                    $userDetail = $user->instructor()->first();

                    $revenueData = CourseSaleModel::select(
                        DB::raw('YEAR(course_sale.created_at) as year'),
                        DB::raw('MONTH(course_sale.created_at) as month'),
                        DB::raw('SUM(course.price) as total_revenue')
                    )
                        ->join('course', 'course_sale.course_id', '=', 'course.id')
                        ->where('instructor_id', '=', $userDetail->id)
                        ->groupBy('year', 'month')
                        ->orderBy('year', 'asc')
                        ->orderBy('month', 'asc')
                        ->get();

                    foreach ($revenueData as $data) {
                        $date = Carbon::createFromDate($data->year, $data->month, 1);
                        $labels[] = $date->format('F Y');
                        $revenueByMonth[] = $data->total_revenue;
                    }

                    $currentMonth = Carbon::now()->month;
                    $currentYear = Carbon::now()->year;

                    // Revenue for the current month
                    $revenue = CourseSaleModel::join('course', 'course_sale.course_id', '=', 'course.id')
                        ->whereYear('course_sale.created_at', $currentYear)
                        ->whereMonth('course_sale.created_at', $currentMonth)
                        ->where('course.instructor_id', '=', $userDetail->id)
                        ->sum('course.price');

                    // Total number of students for the current month
                    $totalStudents = CourseSaleModel::join('course', 'course_sale.course_id', '=', 'course.id')
                        ->whereYear('course_sale.created_at', $currentYear)
                        ->whereMonth('course_sale.created_at', $currentMonth)
                        ->where('course.instructor_id', '=', $userDetail->id)
                        ->distinct('course_sale.student_id')
                        ->count('course_sale.student_id');

                    // Total number of course sold for the current month
                    $courseSold = CourseSaleModel::join('course', 'course_sale.course_id', '=', 'course.id')
                        ->whereYear('course_sale.created_at', $currentYear)
                        ->whereMonth('course_sale.created_at', $currentMonth)
                        ->where('course.instructor_id', '=', $userDetail->id)
                        ->count('course_sale.course_id');

                    $topCourses = CourseSaleModel::select(
                        'course.id',
                        'course.title',
                        'course.image', // Assuming you have an image column for course thumbnail
                        DB::raw('SUM(course.price) as total_revenue'),
                        DB::raw('COUNT(course_sale.id) as total_sales')
                    )
                        ->join('course', 'course_sale.course_id', '=', 'course.id')
                        ->join('instructor_info', 'course.instructor_id', '=', 'instructor_info.id')
                        ->where('course.instructor_id', '=', $userDetail->id)
                        ->groupBy('course.id', 'course.title', 'course.image')
                        ->orderBy('total_revenue', 'desc')
                        ->take(4)
                        ->get();

                    $courses = CourseModel::select('course.id', 'course.name', 'course.title', 'course.level', 'course.image')
                        ->join('course_sale', 'course_sale.course_id', '=', 'course.id')
                        ->groupBy('course.id', 'course.name', 'course.title', 'course.level', 'course.image')
                        ->where('course.instructor_id', '=', $userDetail->id)
                        ->select('course.id', 'course.name', 'course.title', 'course.level', 'course.image', DB::raw('count(course_sale.student_id) as total_students'))
                        ->withAvg('review', 'rate')
                        ->withCount('review')
                        ->withCount('sale')
                        ->take(4)
                        ->get();

                    // foreach ($courses as $course) {
                    //     // echo $course->id;
                    //     // Accessing the calculated attributes correctly
                    //     $reviewCount = $course->review_count;
                    //     $reviewAvgRate = $course->review_avg_rate;
                    //     $saleCount = $course->sale_count;

                    //     dd($reviewCount, $reviewAvgRate, $saleCount);
                    // }

                }
            }

            View::share([
                'labels' => $labels,
                'revenueByMonth' => $revenueByMonth,
                'revenue' => $revenue,
                'totalStudents' => $totalStudents,
                'courseSold' => $courseSold,
                'user' => $user,
                'userDetail' => $userDetail,
                'topCourses' => $topCourses,
                'courses' => $courses,
            ]);
            return view('instructor.dashboard-instructor', ['title' => 'Dashboard']);
        } else {

            return redirect()->route('dashboard');
        }
    }

    public function instructorProfile($id)
    {
        $user = UserModel::find($id);
        $userDetail = InstructorModel::find($id);

        // Tổng số khóa học
        $courses = CourseModel::where('instructor_id', $userDetail->id)->withAvg('review', 'rate')
            ->withCount('review')
            ->withCount('sale')
            ->orderBy('created_at', 'desc')
            ->get();
        $totalCourses = $courses->count();

        // Tổng số sinh viên
        $totalStudents = DB::table('course_sale')
            ->join('course', 'course_sale.course_id', '=', 'course.id')
            ->where('course.instructor_id', $userDetail->id)
            ->distinct('course_sale.student_id')
            ->count('course_sale.student_id');

        // Tổng số đánh giá
        $totalReviews = DB::table('course_review')
            ->join('course', 'course_review.course_id', '=', 'course.id')
            ->where('course.instructor_id', $userDetail->id)
            ->count('course_review.id');


        // dd($courses);
        View::share([
            'user' => $user,
            'userDetail' => $userDetail,
            'totalReviews' => $totalReviews,
            'totalCourses' => $totalCourses,
            'totalStudents' => $totalStudents,
            'courses' => $courses,
        ]);
        return view('instructor.instructor-profile', ['title' => 'Profile']);
    }

    public function addCourse()
    {



        return view('instructor.add-course', ['title' => 'Add Course']);
    }


    // public function handleAddCourse($id, Request $request)
    // {
    //     try {
    //         $validatedData = $request->validate(
    //             [
    //                 'course-name' => 'required|string|max:255',
    //                 'course-title' => 'required|string|max:255',
    //                 'course-category' => 'required|integer',
    //                 'course-level' => 'required',
    //                 'course-description' => 'required|string',
    //                 'course-preview' => 'required|string|max:255',
    //                 'course-video-url' => 'required|url',
    //                 'course-image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //                 'course-price' => 'required|numeric',
    //                 'sections.*.lectures.*.lectureVideo' => 'required|file|mimes:mp4,mov,avi|max:2048',
    //             ],
    //             [
    //                 'course-name.required' => 'Course name is required',
    //                 'course-title.required' => 'Course title is required',
    //                 'course-category.required' => 'Course category is required',
    //                 'course-level.required' => 'Course level is required',
    //                 'course-description.required' => 'Course description is required',
    //                 'course-preview.required' => 'Course preview is required',
    //                 'course-price.required' => 'Course price is required',
    //                 'course-video-url.url' => 'Video URL must be a valid URL',
    //                 'course-video-url.required' => 'Video URL must be a valid URL',
    //                 'course-image.required' => 'Course image must be a required',
    //                 'course-image.image' => 'Course image must be an image',
    //                 'course-image.mimes' => 'Course image must be a JPEG, PNG, JPG, GIF, or SVG file',
    //                 'course-image.max' => 'Course image size must not exceed 2MB',
    //                 'course-price.numeric' => 'Course price must be a number',
    //                 'course-name.string' => 'Course name must be String',
    //                 'course-name.max' => 'Course name size must not exceed 255 characters',
    //                 'course-title.string' => 'Course title must be a string',
    //                 'course-title.max' => 'Course title size must not exceed 255 characters',
    //                 'course-description.string' => 'Course description must be a string',
    //                 'course-preview.string' => 'Course preview must be a string',
    //                 'course-preview.max' => 'Course preview size must not exceed 255 characters',
    //                 'sections.*.lectures.*.lectureVideo.file' => 'Lecture video must be a file',
    //                 'sections.*.lectures.*.lectureVideo.mimes' => 'Lecture video must be a MP4, MOV, AVI file',
    //                 'sections.*.lectures.*.lectureVideo.max' => 'Lecture video size must not exceed 2MB',
    //                 'sections.*.lectures.*.lectureVideo.required' => 'Lecture video must be a required',

    //             ]
    //         );
    //         // if (!$validatedData) {
    //         //     return back()->withErrors($validatedData)->withInput();
    //         // }
    //         // Handle file uploads if necessary
    //         if ($request->hasFile('course-image')) {
    //             $request->file('course-image')->store('upload/images/course', 'public');
    //         }

    //         // Save the course
    //         $course = new CourseModel();
    //         $course->name = $validatedData['course-name'];
    //         $course->title = $validatedData['course-title'];
    //         $course->level = $validatedData['course-level'];
    //         $course->description = $validatedData['course-description'];
    //         $course->course_media = $validatedData['course-video-url'];
    //         $course->preview = $validatedData['course-preview'];
    //         $course->image = $validatedData['course-image'] ?? null;
    //         $course->price = $validatedData['course-price'];
    //         $course->course_cate_id = $validatedData['course-category'];
    //         $course->instructor_id = $id; // assuming the instructor is the logged-in user
    //         $course->save();

    //         // Decode sections data
    //         $sectionsData = json_decode($request->input('sections'), true);
    //         // $sectionsData = $request->input('sections');

    //         if (is_array($sectionsData)) {
    //             foreach ($sectionsData as $sectionData) {
    //                 if (!isset($sectionData['sectionName'])) {
    //                     throw new \Exception('Section name is missing');
    //                 }

    //                 $section = new CourseSectionModel();
    //                 $section->course_id = $course->id;
    //                 $section->name = $sectionData['sectionName'];
    //                 $section->save();

    //                 if (isset($sectionData['lectures']) && is_array($sectionData['lectures'])) {
    //                     foreach ($sectionData['lectures'] as $lectureData) {
    //                         if (!isset($lectureData['lectureName'])) {
    //                             throw new \Exception('Lecture name is missing');
    //                         }

    //                         $lecture = new CourseLectureModel();
    //                         $lecture->section_id = $section->id;
    //                         $lecture->name = $lectureData['lectureName'];

    //                         if (isset($lectureData['lectureVideo'])) {
    //                             if ($lectureData['lectureVideo'] instanceof \Illuminate\Http\UploadedFile) {
    //                                 $videoPath = $lectureData['lectureVideo']->store('upload/videos', 'public');
    //                                 $lecture->video = $videoPath;
    //                             } else {
    //                                 throw new \Exception('Lecture video is not a valid file');
    //                             }
    //                         }

    //                         $lecture->save();
    //                     }
    //                 } else {
    //                     throw new \Exception('Lectures data is missing or not an array');
    //                 }
    //             }
    //         } else {
    //             throw new \Exception('Sections data is not an array');
    //         }

    //         // return redirect()->route('dashboard-user');
    //         return response()->json(['message' => 'Course added successfully']);
    //     } catch (\Exception $e) {
    //         // Return an error response if an exception occurs
    //         return response()->json(['error' => 'Error Course added: ' . $e->getMessage()], 500);
    //     }
    // }



    // public function handleAddCourse($id, Request $request)
    // {
    //     Log::info('Request Data:', $request->all());

    //     // Validate request data
    //     $validatedData = Validator::make(
    //         $request->all(),
    //         [
    //             'course_name' => 'required|string|max:255',
    //             'course_title' => 'required|string|max:255',
    //             'course_category' => 'required|integer',
    //             'course_level' => 'required',
    //             'course_description' => 'required|string',
    //             'course_preview' => 'required|string|max:255',
    //             'course_video_url' => 'required|url',
    //             'course_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //             'course_price' => 'required|numeric',
    //             'sections' => 'required|array',
    //             'sections.*.sectionName' => 'required|string',
    //             'sections.*.lectures' => 'required|array',
    //             'sections.*.lectures.*.lectureName' => 'required|string',
    //             'sections.*.lectures.*.lectureVideo' => 'nullable|file|mimes:mp4',
    //         ],
    //         [
    //             'sections.required' => 'Sections are required',
    //             'sections.*.sectionName.required' => 'Section name is required',
    //             'sections.*.lectures.required' => 'Lectures are required',
    //             'sections.*.lectures.*.lectureName.required' => 'Lecture name is required',
    //             'sections.*.lectures.*.lectureVideo.file' => 'Lecture video must be a file',
    //             'sections.*.lectures.*.lectureVideo.mimes' => 'Lecture video must be an MP4',
    //             'sections.*.lectures.*.lectureVideo.required' => 'Lecture video is required',
    //         ]
    //     );

    //     if ($validatedData->fails()) {
    //         Log::info('Validation Errors:', $validatedData->errors()->all());
    //         return redirect()->back()->withErrors($validatedData)->withInput();
    //     }

    //     // Continue with saving the data
    //     $courseImageName = null;
    //     if ($request->hasFile('course_image')) {
    //         $courseImageName = $request->file('course_image')->getClientOriginalName();
    //         $request->file('course_image')->storeAs('upload/images/course', $courseImageName, 'public');
    //     }

    //     $course = new CourseModel();
    //     $course->name = $request->course_name;
    //     $course->title = $request->course_title;
    //     $course->level = $request->course_level;
    //     $course->description = $request->course_description;
    //     $course->course_media = $request->course_video_url;
    //     $course->preview = $request->course_preview;
    //     $course->image = $courseImageName;
    //     $course->price = $request->course_price;
    //     $course->course_cate_id = $request->course_category;
    //     $course->instructor_id = $id;
    //     $course->save();

    //     $sectionsData = $request->input('sections', []);
    //     foreach ($sectionsData as $sectionData) {
    //         $section = new CourseSectionModel();
    //         $section->course_id = $course->id;
    //         $section->name = $sectionData['sectionNameP'];
    //         $section->save();

    //         foreach ($sectionData['lecturesP'] as $lectureData) {
    //             $lecture = new CourseLectureModel();
    //             $lecture->section_id = $section->id;
    //             $lecture->name = $lectureData['lectureNameP'];

    //             if (isset($lectureData['lectureVideoP'])) {
    //                 $lectureVideoName = $lectureData['lectureVideoP']->getClientOriginalName();
    //                 $lectureVideoPath = $lectureData['lectureVideoP']->storeAs('upload/videos', $lectureVideoName, 'public');
    //                 $lecture->video = $lectureVideoName;
    //             }

    //             $lecture->save();
    //         }
    //     }

    //     return redirect()->route('dashboard-user')->with('success', 'Course added successfully!');
    // }

    public function handleAddCourse($id, Request $request)
    {
        Log::info('Request Data:', $request->all());

        // Validate request data
        $validatedData = Validator::make(
            $request->all(),
            [
                'course_name' => 'required|string|max:255',
                'course_title' => 'required|string|max:255',
                'course_category' => 'required|integer',
                'course_level' => 'required',
                'course_description' => 'required|string',
                'course_preview' => 'required|string|max:255',
                'course_video_url' => 'required|url',
                'course_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'course_price' => 'required|numeric',
                'sections' => 'required|array',
                'sections.*.sectionName' => 'required|string',
                'sections.*.lectures' => 'required|array',
                'sections.*.lectures.*.lectureName' => 'required|string',
                'sections.*.lectures.*.lectureVideo' => 'nullable|file|mimes:mp4',
            ],
            [
                'sections.required' => 'Sections are required',
                'sections.*.sectionNameP.required' => 'Section name is required',
                'sections.*.lectures.required' => 'Lectures are required',
                'sections.*.lectures.*.lectureName.required' => 'Lecture name is required',
                'sections.*.lectures.*.lectureVideo.file' => 'Lecture video must be a file',
                'sections.*.lectures.*.lectureVideo.mimes' => 'Lecture video must be an MP4',
                'sections.*.lectures.*.lectureVideo.required' => 'Lecture video is required',
            ]
        );

        if ($validatedData->fails()) {
            Log::info('Validation Errors:', $validatedData->errors()->all());
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        // dd($request->all());

        // Continue with saving the data
        $courseImageName = null;
        if ($request->hasFile('course_image')) {
            $courseImageName = $request->file('course_image')->getClientOriginalName();

            $request->file('course_image')->storeAs('upload/images/course', $courseImageName, 'public');
        }


        $sectionsData = $request->sections;

        // dd($courseImageName);


        if ($sectionsData) {

            $course = new CourseModel();
            $course->name = $request->course_name;
            $course->title = $request->course_title;
            $course->level = $request->course_level;
            $course->description = $request->course_description;
            $course->course_media = $request->course_video_url;
            $course->preview = $request->course_preview;
            $course->image = $courseImageName;
            $course->price = $request->course_price;
            $course->course_cate_id = $request->course_category;
            $course->instructor_id = $id;
            $course->save();

            foreach ($sectionsData as $sectionData) {
                $section = new CourseSectionModel();
                $section->course_id = $course->id;
                $section->name = $sectionData['sectionName'];
                $section->save();

                if (isset($sectionData['lectures']) && is_array($sectionData['lectures'])) {
                    foreach ($sectionData['lectures'] as $lectureData) {
                        Log::info('Lecture Data:', $lectureData); // Kiểm tra toàn bộ dữ liệu lectureData

                        $lecture = new CourseLectureModel();
                        $lecture->section_id = $section->id;
                        $lecture->name = $lectureData['lectureName'];
                        $lecture->duration = 200;

                        if (isset($lectureData['lectureVideo']) && $lectureData['lectureVideo'] instanceof \Illuminate\Http\UploadedFile) {
                            Log::info('Lecture Video:', [
                                'original_name' => $lectureData['lectureVideo']->getClientOriginalName(),
                                'path' => $lectureData['lectureVideo']->getRealPath()
                            ]);

                            if ($lectureData['lectureVideo']->isValid()) {
                                $lectureVideoName = $lectureData['lectureVideo']->getClientOriginalName();
                                $lectureData['lectureVideo']->storeAs('upload/videos', $lectureVideoName, 'public');
                                $lecture->video = $lectureVideoName;
                            } else {
                                Log::warning('Lecture video is not valid.');
                            }
                        } else {
                            Log::warning('Lecture video is missing or not an instance of UploadedFile.');
                        }

                        $lecture->save();
                    }
                }
            }
        } else {
            Log::info('No sections data found in the request.');
        }







        return redirect()->route('dashboard-user')->with('success', 'Course added successfully!');
    }






    public function studentProfile($id)
    {
        $userDetail = null; // Khởi tạo biến $userDetail để tránh lỗi không xác định
        if ($id) {
            $user = UserModel::find($id);

            $userDetail = null; // Khởi tạo biến $userDetail để tránh lỗi không xác định

            if ($user) {
                if ($user->role === 0) {
                    // Lấy chi tiết sinh viên và các cột cụ thể
                    $userDetail = $user->student()->first();
                } elseif ($user->role === 1) {
                    // Lấy chi tiết giảng viên và các cột cụ thể
                    $userDetail = $user->instructor()->first();
                }

                // Kiểm tra nếu userDetail không tồn tại hoặc avatar chưa được cập nhật
                if (!$userDetail || !$userDetail->avatar) {
                    $defaultAvatar = 'avatar-00.jpg'; // Đường dẫn tới ảnh đại diện mặc định

                    // Thiết lập avatar mặc định nếu chưa có
                    $userDetail = (object)[
                        'id' => null,
                        'avatar' => $defaultAvatar,
                        'firstname' => $userDetail->firstname ?? 'Default Firstname',
                        'lastname' => $userDetail->lastname ?? 'Default Lastname',
                        'phone' => $userDetail->phone ?? 'Default Phone',
                        'email' => $userDetail->email ?? 'Default email',
                        'birthday' => $userDetail->birthday ?? 'Default birthday',
                        'address' => $userDetail->address ?? 'Default Address',
                    ];
                }
            }
        }
        View::share([
            'userDetail' => $userDetail,
        ]);

        // dd($user);
        return view('student.profile-edit', ['title' => 'Profile']);
    }


    public function updateStudentInfo($id, Request $request)
    {
        // Validate the form data
        $validate = Validator::make(
            $request->all(),
            [
                'fname' => ['required', 'string', 'max:255'],
                'lname' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'phone:VN'], // Sử dụng 'phone' với mã quốc gia
                'address' => ['required', 'string'],
            ],
            [
                'fname.required' => 'Firstname is required',
                'fname.string' => 'Firstname must be a string',
                'fname.max' => 'Firstname may not be greater than 255 characters',
                'lname.required' => 'Lastname is required',
                'lname.string' => 'Lastname must be a string',
                'lname.max' => 'Lastname may not be greater than 255 characters',
                'phone.required' => 'Phone is required',
                'phone.phone' => 'Phone must be a valid phone number',
                'address.required' => 'Address is required',
                'address.string' => 'Address must be a string'
            ]
        );

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with([
                'msg' => 'An error occurred',
                'alert-type' => 'danger'
            ]);
        } else {
            // Update or create user
            $user = StudentModel::updateOrCreate(
                ['user_id' => $id],
                [
                    'firstname' => $request->fname,
                    'lastname' => $request->lname,
                    'phone' => $request->phone,
                    'address' => $request->address
                ]
            );

            if ($user) {
                return redirect()->back()->with([
                    'msg' => 'Updated successfully',
                    'alert-type' => 'success'
                ]);
            }
        }
    }

    // UserController.php
    public function updateAvatar(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            // Get the authenticated user
            $user = Auth::user();
            $user = UserModel::find($user->id);

            // Determine the user's role and get the user details
            $userDetail = $user->role === 0 ? $user->student()->first() : $user->instructor()->first();

            // Generate a new avatar name
            $avatarName = $user->id . '_avatar' . time() . '.' . $request->avatar->getClientOriginalExtension();

            // Store the new avatar
            $request->avatar->storeAs('public/upload/images/avatar', $avatarName);

            if ($userDetail) {
                // Delete the old avatar if it exists
                if ($userDetail->avatar) {
                    Storage::delete('public/upload/images/avatar/' . $userDetail->avatar);
                }

                // Update the user detail with the new avatar
                $userDetail->avatar = $avatarName;
                $userDetail->save();
            } else {
                // Create a new record if userDetail is null
                StudentModel::create([
                    'avatar' => $avatarName,
                    'user_id' => $user->id
                ]);
            }

            // Return a successful response
            return response()->json(['success' => true, 'avatar_url' => asset('storage/upload/images/avatar/' . $avatarName)]);
        } catch (\Exception $e) {
            // Return an error response if an exception occurs
            return response()->json(['error' => 'Error updating avatar: ' . $e->getMessage()], 500);
        }
    }


    public function deleteAvatar()
    {
        try {
            // Get the authenticated user
            $user = Auth::user();
            $user = UserModel::find($user->id);

            // Determine the user's role and get the user details
            $userDetail = $user->role === 0 ? $user->student()->first() : $user->instructor()->first();

            // Xóa ảnh cũ nếu có
            if ($userDetail->avatar) {
                Storage::delete('upload/images/avatar/' . $userDetail->avatar);
                $userDetail->avatar = null;
                $userDetail->save();
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Return an error response if an exception occurs
            return response()->json(['error' => 'Error updating avatar: ' . $e->getMessage()], 500);
        }
    }
    public function changePassword(Request $request)
    {
        try {
            $request->validate([
                'currentpassword' => 'required',
                'newpassword' => 'required|min:1',
                'confirmpassword' => 'required|same:newpassword',
            ]);

            $user = Auth::user();
            $user = UserModel::find($user->id);

            if (!Hash::check($request->currentpassword, $user->password)) {
                return response()->json(['error' => 'Current password is incorrect'], 400);
            }

            $user->password = Hash::make($request->newpassword);
            $user->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Return an error response if an exception occurs
            return response()->json(['error' => 'Error : ' . $e->getMessage()], 500);
        }
    }

    public function updateEmail(Request $request)
    {
        try {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            ]);

            $user = Auth::user();
            $user = UserModel::find($user->id);
            $user->email = $request->email;
            $user->save();

            return response()->json(['success' => true, 'email' => $user->email]);
        } catch (\Exception $e) {
            // Return an error response if an exception occurs
            return response()->json(['error' => 'Error : ' . $e->getMessage()], 500);
        }
    }

    public function deleteAccount(Request $request)
    {
        // Kiểm tra xem người dùng đã đăng nhập
        $user = Auth::user();
        $user = UserModel::find($user->id);

        if ($user) {
            // Xoá tài khoản người dùng và thực hiện các hành động liên quan khác
            $user->delete(); // Xoá người dùng
            // Thực hiện thêm các hành động khác nếu cần thiết, ví dụ: huỷ đăng ký khoá học, xoá dữ liệu liên quan,...

            // Đăng xuất người dùng sau khi xoá tài khoản
            Auth::logout();

            // Chuyển hướng về trang chủ với thông báo thành công 
            return redirect('/login')->with([
                'msg' => 'Your account has been deleted successfully.',
                'alert-type' => 'success',
            ]);
        }

        // Nếu không tìm thấy người dùng, chuyển hướng về trang chủ với thông báo lỗi
        return redirect('/login')->with('error', 'User not found.');
    }
}
