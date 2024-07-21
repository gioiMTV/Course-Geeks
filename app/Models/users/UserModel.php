<?php

namespace App\Models\users;

use App\Models\courses\CourseReviewModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'verify_token',
    ];

    public function student()
    {
        return $this->hasOne(StudentModel::class, 'user_id', 'id');
    }

    public function instructor()
    {
        return $this->hasOne(InstructorModel::class, 'user_id', 'id');
    }

    public function review() {
        return $this->hasMany(CourseReviewModel::class, 'user_id', 'id');
    }
}
