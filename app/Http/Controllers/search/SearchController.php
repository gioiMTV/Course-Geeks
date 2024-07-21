<?php

namespace App\Http\Controllers\search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\courses\CourseModel;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function searchLive(Request $request)
    {
        try {
            $query = $request->input('query');
            $instructorId = $request->input('instructor_id');

            $courses = CourseModel::select(
                'course.id',
                'course.title',
                'course.level',
                'course.image',
                DB::raw('count(course_sale.student_id) as total_students')
            )
                ->where(function ($q) use ($query) {
                    $q->where('course.id', 'like', '%' . $query . '%')
                        ->orWhere('course.title', 'like', '%' . $query . '%')
                        ->orWhere('course.level', 'like', '%' . $query . '%');
                        // ->orWhere('course.preview', 'like', '%' . $query . '%');
                })
                ->join('course_sale', 'course_sale.course_id', '=', 'course.id')
                ->groupBy('course.id', 'course.title', 'course.level', 'course.image')
                ->where('course.instructor_id', '=', $instructorId)
                ->withAvg('review', 'rate')
                ->withCount('review')
                ->withCount('sale')
                ->take(4)
                ->get();

            // if (count($courses) > 0) {
            //     $output = '
            //     <tbody id="search-list">';

            //     foreach ($courses as $course) {
            //         $output .= '<tr>
            //             <td>
            //                 <div class="d-flex align-items-center">
            //                     <div>
            //                         <a href="' . route('course-detail', $course->id) . '">
            //                             <img src="' . asset('storage/upload/images/course/' . $course->image) . '" alt="course" class="rounded img-4by3-lg">
            //                         </a>
            //                     </div>
            //                     <div class="ms-3">
            //                         <h4 class="mb-1 h5">
            //                             <a href="' . route('course-detail', $course->id) . '" class="text-inherit">' . $course->title . '</a>
            //                         </h4>
            //                         <ul class="list-inline fs-6 mb-0">
            //                             <li class="list-inline-item">
            //                                 <span class="align-text-bottom">
            //                                     <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
            //                                         <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"></path>
            //                                         <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"></path>
            //                                     </svg>
            //                                 </span>
            //                                 <span>1h 30m</span>
            //                             </li>
            //                             <li class="list-inline-item">';
            //         if ($course->level == 'Beginner') {
            //             $output .= '<svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            //                     <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
            //                     <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9" />
            //                     <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />
            //                 </svg>';
            //         } elseif ($course->level == 'Intermediate') {
            //             $output .= '<svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            //                     <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
            //                     <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE" />
            //                     <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />
            //                 </svg>';
            //         } elseif ($course->level == 'Advance') {
            //             $output .= '<svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            //                     <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE"></rect>
            //                     <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE"></rect>
            //                     <rect x="11" y="2" width="2" height="12" rx="1" fill="#754FFE"></rect>
            //                 </svg>';
            //         }
            //         $output .= $course->level . '</li>
            //                         </ul>
            //                     </div>
            //                 </div>
            //             </td>
            //             <td>' . $course->total_students . '</td>
            //             <td>
            //                 <span class="lh-1">
            //                     <span class="text-warning">';
            //         if (floor($course->review_avg_rate) == $course->review_avg_rate) {
            //             $output .= number_format($course->review_avg_rate, 0);
            //         } else {
            //             $output .= number_format($course->review_avg_rate, 1);
            //         }
            //         $output .= '</span>
            //                     <span class="mx-1 align-text-top">
            //                         <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
            //                             <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
            //                         </svg>
            //                     </span>
            //                     (' . $course->review_count . ', ' . $course->sale_count . ')
            //                 </span>
            //             </td>
            //             <td>
            //                 <span class="dropdown dropstart">
            //                     <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="courseDropdown" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
            //                         <i class="fe fe-more-vertical"></i>
            //                     </a>
            //                     <span class="dropdown-menu" aria-labelledby="courseDropdown">
            //                         <span class="dropdown-header">Setting</span>
            //                         <a class="dropdown-item" href="#">
            //                             <i class="fe fe-edit dropdown-item-icon"></i>
            //                             Edit
            //                         </a>
            //                         <a class="dropdown-item" href="#">
            //                             <i class="fe fe-trash dropdown-item-icon"></i>
            //                             Remove
            //                         </a>
            //                     </span>
            //                 </span>
            //             </td>
            //         </tr>';
            //     }
            //     $output .= '</tbody>';
            // } else {
            //     $output = '<tbody id="search-list"><tr><td colspan="4">No course matches your search.</td></tr></tbody>';
            // }

            return response()->json($courses, 200);
        } catch (\Exception $e) {
            // Return an error response if an exception occurs
            return response()->json(['error' => 'Error search course: ' . $e->getMessage()], 500);
        }
    }

    // public function searchCourse(Request $request) {
    //     $query = $request->input('query');
    //         $courses = CourseModel::select(
    //             'course.id',
    //             'course.title',
    //             'course.level',
    //             'course.image',
    //             DB::raw('count(course_sale.student_id) as total_students')
    //         )
    //             ->where(function ($q) use ($query) {
    //                 $q->where('course.id', 'like', '%' . $query . '%')
    //                     ->orWhere('course.title', 'like', '%' . $query . '%')
    //             })
    //             ->join('instructor_info', 'instructor_info.instructor_id', '=', 'instructor_id')
    //             ->groupBy('course.id', 'course.title', 'course.level', 'course.image')
    //             ->get();
    //             return false;
    // }
}
