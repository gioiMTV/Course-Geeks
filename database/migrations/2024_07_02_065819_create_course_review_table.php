<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('course_review', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->integer('rate');
            $table->foreignId('course_id')->constrained('course')->onDelete('cascade');
            $table->foreignId('student_id')->constrained('student_info')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_review');
    }
};
