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
        Schema::create('course', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('level');
            $table->text('description');
            $table->string('course_media');
            $table->string('image');
            $table->string('preview');
            $table->text('faq');
            $table->float('price');
            $table->foreignId('course_cate_id')->constrained('course_cate')->onDelete('cascade');
            $table->foreignId('instructor_id')->constrained('instructor_info')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course');
    }
};
