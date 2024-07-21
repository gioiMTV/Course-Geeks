<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\pages\SignUpController;

use App\Http\Controllers\pages\LoginController;

use App\Http\Controllers\pages\TermConditionController;

use App\Http\Controllers\pages\VerifyController;

use App\Http\Controllers\Admin\DashboardController;

use App\Http\Middleware\CheckAdmin;

use App\Http\Controllers\Users\DashboardUserController as UserController;

use App\Http\Controllers\ProgressController;

use App\Http\Controllers\search\SearchController;

use App\Http\Controllers\courses\CourseCategoryController;

use App\Http\Controllers\courses\CourseController;

use App\Http\Controllers\pages\BlogController;

use App\Http\Controllers\pages\HelpController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware(['ShareData'])->group(function () {
    // Login and Sign up
    Route::get('/login', [LoginController::class, 'login'])->name('login');

    Route::post('/login', [LoginController::class, 'handleLogin'])->name('login');

    Route::post('/logout', [LoginController::class, 'handleLogout'])->name('logout');

    Route::get('/signup', [SignUpController::class, 'signup'])->name('signup');

    Route::post('/signup', [SignUpController::class, 'register'])->name('post-signup');

    Route::get('/forget-password', [LoginController::class, 'forget'])->name('forget-password');

    Route::post('/forget-password', [LoginController::class, 'handleForgetPassword'])->name('forget-password');

    Route::get('/verify/{token}', [VerifyController::class, 'verify'])->name('verify');

    Route::get('/send/{token}', [VerifyController::class, 'send'])->name('send');

    // User
    Route::get('/Dashboard', [UserController::class, 'index'])->name('dashboard-user');

    Route::get('/instructor-profile/{id}', [UserController::class, 'instructorProfile'])->name('instructor-profile');

    Route::get('/add-course', [UserController::class, 'addCourse'])->name('add-course');

    Route::post('/add-course/{id}', [UserController::class, 'handleAddCourse'])->name('handle-add-course');

    Route::get('/student-profile/{id}', [UserController::class, 'studentProfile'])->name('student-profile');

    Route::post('/student-profile/{id}', [UserController::class, 'updateStudentInfo'])->name('post-student-profile');

    Route::post('/update-avatar', [UserController::class, 'updateAvatar'])->name('update-avatar');

    Route::post('/delete-avatar', [UserController::class, 'deleteAvatar'])->name('delete-avatar');

    Route::post('/change-password', [UserController::class, 'changePassword'])->name('change.password');

    Route::post('/update-email', [UserController::class, 'updateEmail'])->name('update.email');

    Route::post('/delete-account', [UserController::class, 'deleteAccount'])->name('delete.account');

    Route::get('/search', [SearchController::class, 'searchLive'])->name('search.course');



    // Courses

    Route::get('/course-category/{id}', [CourseCategoryController::class, 'showProduct'])->name('course-category');

    Route::post('/bookmark', [CourseController::class, 'bookmark']);

    Route::get('/course-detail/{id}', [CourseController::class, 'detail'])->name('course-detail');

    Route::post('/update-progress', [ProgressController::class, 'updateProgress']);

    Route::get('checkout/{id}', [CourseController::class, 'checkout'])->name('checkout');

    Route::get('/course-section/{id}/lecture/{lecture?}', [CourseController::class, 'lecture'])->name('course-lecture');


    // Blogs
    Route::get('/blog-category', [BlogController::class, 'index'])->name('blog-category');

    Route::get('/blog-list', [BlogController::class, 'blogList'])->name('blog-list');

    Route::get('/blog-detail/{id}', [BlogController::class, 'detail'])->name('blog-detail');

    // Help
    Route::get('/help', [HelpController::class, 'index'])->name('help');
    // Term
    Route::get('/term-condition', [TermConditionController::class, 'index'])->name('term-condition');

    // 404
    Route::get('/404', function () {
        return view('errors.404');
    })->name('404');



    // admin
    Route::prefix('/admin')->middleware([CheckAdmin::class])->group(function () {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // courses
        Route::get('/courses', [DashboardController::class, 'courses'])->name('courses');

        // categories
        Route::get('/course-category', [DashboardController::class, 'categories'])->name('category');

        Route::post('/course-category', [DashboardController::class, 'storeCategory'])->name('category.store');

        Route::put('/course-category/{id}', [DashboardController::class, 'updateCategory'])->name('category.update');

        Route::delete('/course-category/{id}', [DashboardController::class, 'deleteCategory'])->name('category.delete');

        // instructors
        Route::get('/instructors', [DashboardController::class, 'instructors'])->name('instructors');

        // students
        Route::get('/students', [DashboardController::class, 'students'])->name('students');
    });
});
