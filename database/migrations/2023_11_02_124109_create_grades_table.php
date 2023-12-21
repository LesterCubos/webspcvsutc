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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('student_number');
            $table->string('grade');
            $table->string('completion')->default('-');
            // $table->string('remarks')->default(0);
            $table->string('course_name')->default(0);
            $table->string('course_title')->default(0);
            $table->string('instructor_name')->default(0);
            $table->string('academic_year')->default(0);
            $table->string('semester')->default(0);
            $table->string('units')->default(0);
            $table->string('credits')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
