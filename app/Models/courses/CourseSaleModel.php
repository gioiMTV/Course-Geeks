<?php

namespace App\Models\courses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSaleModel extends Model
{
    use HasFactory;

    protected $table = 'course_sale';

    public function course() {
        return $this->belongsTo(CourseModel::class, 'course_id', 'id');
    }
}
