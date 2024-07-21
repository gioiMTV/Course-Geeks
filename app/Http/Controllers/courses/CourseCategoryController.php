<?php

namespace App\Http\Controllers\courses;

use App\Http\Controllers\Controller;
use App\Models\courses\CourseCategoryModel;
use App\Models\courses\CourseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CourseCategoryController extends Controller
{
    public function showProduct($category, Request $request)
    {
        $title = 'Course Categories';
        $courses = [];
        $totalCourse = 0;
        $sort = '';
        $newCategory = $request->input('newCategory', $category);
        $newRate = $request->input('newRate', 0);
        $newLevel = $request->input('newLevel', '');

        if (!empty($newCategory)) {
            $category = $newCategory;
        }

        if (!empty($category)) {
            $categoryModel = CourseCategoryModel::find($category);

            if ($categoryModel) {
                $totalCourse = $categoryModel->course->count();
                $coursesQuery = $categoryModel->course()
                    ->withAvg('review', 'rate')
                    ->withCount('review')
                    ->withCount('sale')
                    ->whereHas('review', function ($query) use ($newRate) {
                        $query->where('rate', '>=', $newRate);
                    })
                    ->having('review_avg_rate', '>=', $newRate)
                    ->where('course_cate_id', '=', $categoryModel->id);

                switch ($newLevel) {
                    case 'Beginner':
                    case 'Intermediate':
                    case 'Advance':
                        $coursesQuery->where('level', '=', $newLevel);
                        break;
                    default:
                        break;
                }

                if ($request->has('sort')) {
                    $sort = $request->input('sort');
                    switch ($sort) {
                        case 'newest':
                            $coursesQuery->orderByDesc('created_at');
                            break;
                        case 'low_to_high':
                            $coursesQuery->orderBy('price', 'asc');
                            break;
                        case 'high_to_low':
                            $coursesQuery->orderBy('price', 'desc');
                            break;
                        case 'highest_rated':
                            $coursesQuery->orderByDesc('review_avg_rate');
                            break;
                    }
                }

                $courses = $coursesQuery->paginate(9)->withQueryString();
            }
        } else {
            $totalCourse = CourseModel::count();
            $coursesQuery = CourseModel::withAvg('review', 'rate')
                ->withCount('review')
                ->withCount('sale')
                ->whereHas('review', function ($query) use ($newRate) {
                    $query->where('rate', '>=', $newRate);
                })
                ->having('review_avg_rate', '>=', $newRate);

            switch ($newLevel) {
                case 'Beginner':
                case 'Intermediate':
                case 'Advance':
                    $coursesQuery->where('level', '=', $newLevel);
                    break;
                default:
                    break;
            }

            if ($request->has('sort')) {
                $sort = $request->input('sort');
                switch ($sort) {
                    case 'newest':
                        $coursesQuery->orderByDesc('created_at');
                        break;
                    case 'low_to_high':
                        $coursesQuery->orderBy('price', 'asc');
                        break;
                    case 'high_to_low':
                        $coursesQuery->orderBy('price', 'desc');
                        break;
                    case 'highest_rated':
                        $coursesQuery->orderByDesc('review_avg_rate');
                        break;
                }
            }

            $courses = $coursesQuery->paginate(9)->withQueryString();
        }
        // dd($courses);
        return view('courses.course-filter-list', compact('courses', 'totalCourse', 'sort', 'title', 'newCategory', 'newRate', 'newLevel'));
    }
}
