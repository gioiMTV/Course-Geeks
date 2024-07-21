<?php

namespace App\Models\courses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLectureModel extends Model
{
    use HasFactory;

    protected $table = 'course_lecture';

    public function section() {
        return $this->belongsTo(CourseSectionModel::class, 'section_id', 'id');
    }

    public function progress() {
        return $this->hasMany(ProgressModel::class, 'lecture_id', 'id');
    }
}
