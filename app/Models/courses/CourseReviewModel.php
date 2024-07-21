<?php

namespace App\Models\courses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\users\InstructorModel;
use App\Models\users\StudentModel;
class CourseReviewModel extends Model
{
    use HasFactory;
    protected $table = 'course_review';

    public function course() {
        return $this->belongsTo(CourseModel::class, 'course_id', 'id');
    }
    public function student()
    {
        return $this->belongsTo(StudentModel::class, 'student_id', 'id');
    }

    public function instructor()
    {
        return $this->belongsTo(InstructorModel::class, 'instructor_id', 'id');
    }
}
