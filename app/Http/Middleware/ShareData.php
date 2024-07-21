<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\users\UserModel;
use App\Models\courses\CourseCategoryModel;
use Illuminate\Support\Facades\DB;

class ShareData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $bookmarkedCourseIds = [];
        $user = Auth::user();
        $userDetail = null; // Khởi tạo biến $userDetail để tránh lỗi không xác định
        if ($user) {
            $user = UserModel::find($user->id);

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
                        'avatar' => $defaultAvatar,
                        'firstname' => $userDetail->firstname ?? 'Default Firstname',
                        'lastname' => $userDetail->lastname ?? 'Default Lastname',
                        'phone' => $userDetail->phone ?? 'Default Phone',
                        'email' => $userDetail->email ?? 'Default Email',
                        'birthday' => $userDetail->birthday ?? 'Default birthday',
                        'address' => $userDetail->address ?? 'Default Address',
                    ];
                }
                if ($user && $user->role === 0 && $userDetail) {
                    $bookmarkedCourseIds = DB::table('bookmark')
                        ->where('student_id', $userDetail->id)
                        ->pluck('course_id')
                        ->toArray();
                }
            }
        }

         // Course Categories
        $courseCate = CourseCategoryModel::take(5)->get();

        View::share([
            'user' => $user,
            'userDetail' => $userDetail,
            'courseCate' => $courseCate,
            'bookmarkedCourseIds' => $bookmarkedCourseIds,

        ]);

        return $next($request);
    }
}
