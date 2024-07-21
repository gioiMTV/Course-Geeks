<?php

namespace App\Models\courses;

use App\Models\users\StudentModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookmarkModel extends Model
{
    use HasFactory;
    protected $table = 'bookmark';
    protected $fillable = ['student_id', 'course_id'];

    public function student() {
        return $this->belongsTo(StudentModel::class, 'user_id', 'id');
    }
    public function course() {
        return $this->belongsTo(CourseModel::class, 'course_id', 'id');
    }
}
