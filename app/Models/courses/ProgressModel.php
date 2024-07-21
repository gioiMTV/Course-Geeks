<?php

namespace App\Models\courses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\users\StudentModel;

class ProgressModel extends Model
{
    use HasFactory;
    protected $table = 'progress';
    protected $fillable = ['student_id', 'lecture_id', 'progress_now'];

    public function student() {
        return $this->belongsTo(StudentModel::class, 'student_id', 'id');
    }

    public function lecture() {
        return $this->belongsTo(CourseLectureModel::class, 'lecture_id', 'id');
    }
}
