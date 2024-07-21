<?php

namespace App\Http\Controllers\courses;

use App\Http\Controllers\Controller;
use App\Models\courses\BookmarkModel;
use App\Models\courses\CourseLectureModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\courses\CourseModel;
use App\Models\courses\CourseSectionModel;
use App\Models\courses\CourseReviewModel;
use App\Models\courses\CourseSaleModel;
use Carbon\Carbon;
use App\Models\users\UserModel;

class CourseController extends Controller
{

    public function detail($id)
    {
        // course information   
        $course = CourseModel::withAvg('review', 'rate')
            ->withCount('review')
            ->withCount('sale')
            ->find($id);

        // Course rating count
        $starCounts = CourseReviewModel::selectRaw('rate, COUNT(*) as count')
            ->where('course_id', $id)
            ->whereIn('rate', [1, 2, 3, 4, 5])
            ->groupBy('rate')
            ->get();

        // Tạo một mảng để lưu số lượng đánh giá cho mỗi mức sao
        $starCountsArray = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];

        // Lặp qua kết quả từ truy vấn và gán số lượng vào mảng
        foreach ($starCounts as $starCount) {
            $starCountsArray[$starCount->rate] = $starCount->count;
        }

        // Review users and time after comments
        $reviews = CourseReviewModel::where('course_id', $id)
            ->orderBy('created_at', 'desc') // Sắp xếp từ mới nhất đến cũ nhất
            ->paginate(4); // Số bình luận trên mỗi trang

        // Review users and time after comments
        $reviewUsers = [];
        foreach ($reviews as $review) {
            if ($review->student_id !== null) {
                $reviewUsers[] = $review->student;
            }
            if ($review->instructor_id !== null) {
                $reviewUsers[] = $review->instructor;
            }
        }

        // Number of lectures
        $lectures = 0;
        foreach ($course->section as $section) {
            $lectures += $section->lecture->count();
        }

        // Instructor rating
        $totalRating = 0;
        $totalReviews = 0;
        $totalSales = 0;
        $totalCourses = 0;
        $instructorCourses = $course->instructor->course()->with('review', 'sale')->get();

        foreach ($instructorCourses as $instructorCourse) {
            $totalSales += $instructorCourse->sale->count(); // Đếm số lượng sale cho mỗi khóa học
            $totalCourses++;
            foreach ($instructorCourse->review as $review) {
                $totalRating += $review->rate;
                $totalReviews++;
            }
        }

        // Tính trung bình đánh giá
        if ($totalReviews > 0) {
            $averageRating = $totalRating / $totalReviews;
        } else {
            $averageRating = 0; // Trường hợp không có đánh giá nào
        }

        $instructorFields = $course->instructor->preview->field->slice(0, 2);
        // foreach ($instructorFields as $instructorField) {
        //     dd($instructorField->name);
        // }

        // Related courses

        $relatedCourses = CourseModel::withAvg('review', 'rate')
            ->withCount('review')
            ->withCount('sale')
            ->where('course_cate_id', $course->course_cate_id)
            ->where('id', '!=', $course->id)
            ->take(10)
            ->get();
        // dd($relatedCourses);



        View::share([
            'course' => $course,
            'starCountsArray' => $starCountsArray,
            'reviewUsers' => $reviewUsers,
            'reviews' => $reviews,
            'lectures' => $lectures,
            'totalCourses' => $totalCourses,
            'totalSales' => $totalSales,
            'totalRating' => $totalRating,
            'totalReviews' => $totalReviews,
            'averageRating' => $averageRating,
            'instructorFields' => $instructorFields,
            'relatedCourses' => $relatedCourses,
            'user' => Auth::user(), // Nếu đã đăng nhập, truyền user đang đăng nhập vào view
        ]);

        return view('courses.course', ['title' => 'Course Detail']);
    }

    public function lecture($id, $lecture = 1)
    {
        // Lấy thông tin người dùng và student ID
        $user = Auth::user();
        $isSelf = null;
        if ($user) {
            $user = UserModel::find($user->id);
            $isAdmin = $user->role == 2;

            // Kiểm tra vai trò của người dùng
            if ($user->role == 0) { // student
                if ($user->student) { // Kiểm tra xem student có tồn tại không
                    $studentId = $user->student->id;
                    // Tìm section dựa trên ID
                    $section = CourseSectionModel::where('course_id', '=', $id)->first();

                    // Lấy khóa học mà section này thuộc về
                    $course = CourseModel::findOrFail($section->course_id);

                    $isSell = CourseSaleModel::where('student_id', $studentId)
                        ->where('course_id', $course->id)
                        ->first();
                    // dd($course->image);
                    // Lấy tất cả các section của khóa học
                    $sections = $course->section; // Assumes the relationship is named "sections"
                    // Kiểm tra xem sinh viên đã mua khóa học chưa
                    if (!$isSell) {
                        // Sinh viên chưa mua khóa học, chỉ cho phép xem bài giảng đầu tiên
                        $lectureNow = $sections->first()->lecture->first();
                        $lectureIdNow = $lectureNow->id;
                    } else {
                        // Sinh viên đã mua khóa học, cho phép truy cập dựa trên progress
                        $lastProgress = $user->student->progress->last();
                        $lectureIdNow = $lastProgress ? $lastProgress->lecture_id + 1 : $lecture;

                        // Tìm lecture dựa trên lectureIdNow
                        $lectureNow = null;
                        if ($lectureIdNow) {
                            foreach ($sections as $section) {
                                foreach ($section->lecture as $lecture) { // Assumes the relationship is named "lectures"
                                    if ($lecture->id == $lectureIdNow) {
                                        $lectureNow = $lecture;
                                        break 2; // Thoát khỏi cả hai vòng lặp khi tìm thấy lecture
                                    }
                                }
                            }
                        }

                        // Nếu không tìm thấy lecture dựa trên progress, lấy lecture đầu tiên của section đầu tiên
                        if (!$lectureNow) {
                            $lectureNow = $sections->first()->lecture->first();
                        }
                    }

                    $firstLecture = $sections->first()->lecture->first();
                } else { // Student relationship is null
                    // Handle this scenario appropriately if needed
                    return redirect()->route('student-profile', $user->id); // Hoặc một route thích hợp khác để cập nhật thông tin chi tiết
                }
            } else {
                // Non-student roles: Instructor or Admin
                $section = CourseSectionModel::where('course_id', '=', $id)->first();
                $course = CourseModel::findOrFail($section->course_id);
                if ($user->instructor) {
                    $isSelf = $course->instructor_id == $user->instructor->id;
                }
                $isSell = null;
                $sections = $course->section;
                $lectureNow = $sections->first()->lecture->first();
                $lectureIdNow = $lectureNow->id;
                $firstLecture = $sections->first()->lecture->first();
                $studentId = null;
            }

            // Chia sẻ các biến với view
            View::share([
                'course' => $course,
                'sections' => $sections,
                'lectureNow' => $lectureNow,
                'studentId' => $studentId ?? null,
                'lectureIdNow' => $lectureIdNow,
                'firstLecture' => $firstLecture,
                'isSell' => $isSell,
                'isSelf' => $isSelf,
                'isAdmin' => $isAdmin,

            ]);
        } else {
            // Guest users (not logged in)
            $section = CourseSectionModel::where('course_id', '=', $id)->first();
            $course = CourseModel::findOrFail($section->course_id);
            $isSell = null;
            $isSelf = null;
            $sections = $course->section;
            $lectureNow = $sections->first()->lecture->first();
            $lectureIdNow = $lectureNow->id;
            $firstLecture = $sections->first()->lecture->first();
            $studentId = null;

            // Chia sẻ các biến với view
            View::share([
                'course' => $course,
                'sections' => $sections,
                'lectureNow' => $lectureNow,
                'lectureIdNow' => $lectureIdNow,
                'firstLecture' => $firstLecture,
                'studentId' => $studentId,
                'isSell' => $isSell,
                'isSelf' => $isSelf,
                'isAdmin' => false, // Guest users do not have admin role
            ]);
        }

        return view('courses.course-detail', ['title' => 'Course Lecture']);
    }


    private function findLectureById($sections, $lectureIdNow)
    {
        foreach ($sections as $section) {
            foreach ($section->lecture as $lecture) {
                if ($lecture->id == $lectureIdNow) {
                    return $lecture;
                }
            }
        }
        return null;
    }

    public function bookmark(Request $request)
    {
        try {
            $studentId = $request->input('student_id');
            $courseId = $request->input('course_id');

            // Kiểm tra nếu bookmark đã tồn tại
            $bookmark = BookmarkModel::where('student_id', $studentId)
                ->where('course_id', $courseId)
                ->first();

            if ($bookmark) {
                // Xóa bookmark nếu đã tồn tại
                $bookmark->delete();
                return response()->json(['message' => 'Bookmark deleted successfully']);
            } else {
                // Tạo bookmark mới
                BookmarkModel::create([
                    'student_id' => $studentId,
                    'course_id' => $courseId, // Chỗ này phải là $courseId
                ]);
                return response()->json(['message' => 'Bookmark updated successfully']);
            }

            return response()->json(['message' => 'Bookmark updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error updating bookmark: ' . $e->getMessage()], 500);
        }
    }

    public function checkout($id)
    {
        return view('courses.course-checkout', ['title' => 'Checkout']);
    }
}
