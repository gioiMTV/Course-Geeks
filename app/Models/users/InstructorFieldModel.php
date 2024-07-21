<?php

namespace App\Models\users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorFieldModel extends Model
{
    use HasFactory;
    protected $table = 'instructor_field';
    public function field_preview() {
        return $this->belongsTo(InstructorPreviewModel::class, 'instructor_preview_id', 'id');
    }
}
