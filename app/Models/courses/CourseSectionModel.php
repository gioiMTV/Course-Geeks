<?php

namespace App\Models\courses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSectionModel extends Model
{
    use HasFactory;

    protected $table = 'course_section';

    public function course() {
        return $this->belongsTo(CourseModel::class, 'course_id', 'id');
    }

    public function lecture() {
        return $this->hasMany(CourseLectureModel::class, 'section_id', 'id');
    }
}
