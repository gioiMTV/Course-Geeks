<?php

namespace App\Models\users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorPreviewModel extends Model
{
    use HasFactory;
    protected $table = 'instructor_preview';

    public function instructor() {
        return $this->belongsTo(InstructorModel::class, 'instructor_id', 'id');
    }

    public function field () {
        return $this->hasMany(InstructorFieldModel::class, 'instructor_preview_id', 'id');
    }
}
