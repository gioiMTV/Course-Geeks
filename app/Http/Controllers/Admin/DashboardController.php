<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\users\InstructorModel;
use App\Models\courses\CourseModel;
use App\Models\courses\CourseCategoryModel;
use App\Models\courses\CourseSaleModel;
use App\Models\users\StudentModel;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        // Data
        $totalInstructors = InstructorModel::count();

        $totalCourses = CourseModel::count();

        $totalSales = CourseSaleModel::join('course', 'course_sale.course_id', '=', 'course.id')
            ->sum('course.price');

        $totalStudents = StudentModel::count();

        $oneYearAgo = \Carbon\Carbon::now()->subYear();


        /// chart
        // Xác định khoảng thời gian
        $oneYearAgo = Carbon::now()->subYear();

        // Truy vấn doanh số theo tháng
        $sales = CourseSaleModel::join('course', 'course_sale.course_id', '=', 'course.id')
            ->selectRaw('DATE_FORMAT(course_sale.created_at, "%Y-%m") as sale_month')
            ->selectRaw('SUM(course.price) as total_sales')
            ->where('course_sale.created_at', '>=', $oneYearAgo)
            ->groupBy('sale_month')
            ->orderBy('sale_month')
            ->get();

        $months = $sales->pluck('sale_month');
        $totals = $sales->pluck('total_sales');

        // top
        $topInstructors = InstructorModel::join('course', 'instructor_info.id', '=', 'course.instructor_id')
            ->join('course_sale', 'course.id', '=', 'course_sale.course_id')
            ->leftJoin('course_review', 'course.id', '=', 'course_review.course_id')
            ->select(
                'instructor_info.firstname',
                'instructor_info.lastname',
                DB::raw('COUNT(DISTINCT course_sale.course_id) as total_courses_sold'),
                DB::raw('COUNT(DISTINCT course_sale.student_id) as total_students'),
                DB::raw('COUNT(course_review.id) as total_reviews')
            )
            ->groupBy('instructor_info.id', 'instructor_info.firstname', 'instructor_info.lastname')
            ->orderByDesc('total_courses_sold')
            ->limit(5)
            ->get();

        $topCourses = CourseModel::join('course_sale', 'course.id', '=', 'course_sale.course_id')
            ->join('instructor_info', 'course.instructor_id', '=', 'instructor_info.id')
            ->select(
                'course.id as course_id',
                'course.name as course_name',
                'course.image as course_image',
                DB::raw('COUNT(course_sale.id) as total_sales'),
                'instructor_info.firstname as instructor_firstname',
                'instructor_info.lastname as instructor_lastname',
                'instructor_info.avatar as instructor_avatar'
            )
            ->groupBy('course.id', 'course.name', 'course.image', 'instructor_info.id', 'instructor_info.firstname', 'instructor_info.lastname', 'instructor_info.avatar')
            ->orderByDesc('total_sales')
            ->limit(4)
            ->get();

        // dd($sales);

        View::share([
            'totalInstructors' => $totalInstructors,
            'totalCourses' => $totalCourses,
            'totalSales' => $totalSales,
            'totalStudents' => $totalStudents,
            'months' => $months,
            'totals' => $totals,
            'topInstructors' => $topInstructors,
            'topCourses' => $topCourses,
        ]);

        return view('admin.dashboard-admin', ['title' => 'Dashboard']);
    }

    public function courses()
    {

        // Lấy danh sách khóa học với thông tin giảng viên và phân trang
        $courses = CourseModel::with('instructor')
            ->paginate(10); // Số lượng khóa học mỗi trang
        View::share([
            'courses' => $courses,
        ]);
        return view('admin.admin-course-overview', ['title' => 'All courses']);
    }

    public function categories()
    {
        $categories = CourseCategoryModel::with('course')->get();
        View::share([
            'categories' => $categories,
        ]);
        return view('admin.admin-course-category', ['title' => 'All categories']);
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:course_cate,name'
        ]);

        CourseCategoryModel::create([
            'name' => $request->name
        ]);

        return redirect()->route('category')->with('success', 'Category created successfully.');
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:course_cate,name,' . $id
        ]);

        $category = CourseCategoryModel::findOrFail($id);
        $category->update([
            'name' => $request->name
        ]);

        return redirect()->route('category')->with('success', 'Category updated successfully.');
    }

    public function deleteCategory($id)
    {
        $category = CourseCategoryModel::findOrFail($id);
        $category->delete();

        return redirect()->route('category')->with('success', 'Category deleted successfully');
    }

    public function instructors()
    {
        $instructors = InstructorModel::select(
            'instructor_info.id',
            'instructor_info.firstname',
            'instructor_info.lastname',
            'instructor_info.avatar'
        )
            ->leftJoin('course', 'instructor_info.id', '=', 'course.instructor_id')
            ->leftJoin('course_sale', 'course.id', '=', 'course_sale.course_id')
            ->leftJoin('course_review', 'course.id', '=', 'course_review.course_id')
            ->leftJoin('instructor_preview', 'instructor_info.id', '=', 'instructor_preview.instructor_id')
            ->leftJoin('instructor_field', 'instructor_preview.id', '=', 'instructor_field.instructor_preview_id')
            ->selectRaw('COUNT(DISTINCT course.id) as courses_count') // Đếm số khóa học duy nhất
            ->selectRaw('COUNT(DISTINCT course_sale.student_id) as students_count') // Đếm số học viên duy nhất
            ->selectRaw('AVG(course_review.rate) as average_rating') // Điểm đánh giá trung bình
            ->selectRaw('MAX(instructor_field.name) as instructor_field') // Lấy tên lĩnh vực đầu tiên hoặc tên lớn nhất
            ->groupBy(
                'instructor_info.id',
                'instructor_info.firstname',
                'instructor_info.lastname',
                'instructor_info.avatar'
            )
            ->get();

        // Chia sẻ dữ liệu với view
        return view('admin.admin-instructor', [
            'title' => 'All Instructors',
            'instructors' => $instructors,
        ]);
    }

    /*  */



    public function students()
    {
        $students = StudentModel::select(
            'student_info.id',
            'student_info.firstname',
            'student_info.lastname',
            'student_info.avatar',
            'student_info.address',
            'student_info.created_at'
        )
            ->leftJoin('course_sale', 'student_info.id', '=', 'course_sale.student_id') // Đúng join điều kiện cho course_sale
            ->leftJoin('course', 'course_sale.course_id', '=', 'course.id')
            ->selectRaw('COUNT(DISTINCT course.id) as courses_count') // Số lượng khóa học
            ->selectRaw('SUM(course.price) as total_payment') // Tổng số tiền thanh toán
            ->groupBy(
                'student_info.id',
                'student_info.firstname',
                'student_info.lastname',
                'student_info.avatar',
                'student_info.address',
                'student_info.created_at'
            )
            ->get();

        // Chia sẻ dữ liệu với view
        return view('admin.admin-students', [
            'title' => 'All students',
            'students' => $students,
        ]);
    }
}
