<?php

namespace App\Models\users;

use App\Models\courses\CourseModel;
use App\Models\courses\CourseReviewModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\users\InstructorPreviewModel;

class InstructorModel extends Model
{
    use HasFactory;
    protected $table = 'instructor_info';
    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'id');
    }

    public function course()
    {
        return $this->hasMany(CourseModel::class, 'instructor_id', 'id');
    }

    public function courseReview()
    {
        return $this->hasMany(CourseReviewModel::class, 'instructor_id', 'id');
    }

    public function preview()
    {
        return $this->hasOne(InstructorPreviewModel::class, 'instructor_id', 'id');
    }
}
