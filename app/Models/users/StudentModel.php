<?php

namespace App\Models\users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\courses\CourseModel;
use App\Models\courses\CourseReviewModel;
use App\Models\courses\ProgressModel;
use App\Models\courses\BookmarkModel;
class StudentModel extends Model
{
    use HasFactory;
    protected $table = 'student_info';

    protected $fillable = ['firstname', 'lastname', 'phone', 'avatar', 'address', 'user_id'];
    public function user() {
        return $this->belongsTo(UserModel::class, 'user_id', 'id');
    }

    public function course() {
        return $this->hasMany(CourseModel::class, 'course_id', 'id');
    }

    public function courseReview() {
        return $this->hasMany(CourseReviewModel::class, 'student_id', 'id');
    }

    public function progress() {
        return $this->hasMany(ProgressModel::class, 'student_id', 'id');
    }

    public function bookmark () {
        return $this->hasMany(BookmarkModel::class, 'student_id', 'id');
    }
}
