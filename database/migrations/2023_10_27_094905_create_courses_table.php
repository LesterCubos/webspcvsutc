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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('schedcode')->unique()->default(0);
            $table->string('program');
            $table->string('course_name');
            $table->string('instructor_name');
            $table->string('instructor_email')->unique();
            $table->integer('units');
            $table->integer('credits');
            $table->boolean('isActive') ->default(1);
            $table->string('pincode')->unique()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
