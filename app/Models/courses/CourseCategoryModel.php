<?php

namespace App\Models\courses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategoryModel extends Model
{
    use HasFactory;
    protected $table = 'course_cate';

    protected $fillable = ['name'];
    public function course() {
        return $this->hasMany(CourseModel::class, 'course_cate_id', 'id');
    }
}
