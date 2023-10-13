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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('surname');
            $table->string('middle_name');
            $table->string('student_number');
            $table->string('sex');
            $table->string('civil_status');
            $table->string('nationality');
            $table->string('religion');
            $table->string('age');
            $table->date('birthday');
            $table->string('birth_place');
            $table->string('contact_number');
            $table->string('address');
            $table->string('postal_code');
            $table->string('elementary_school');
            $table->string('juniorhigh_school');
            $table->string('seniorhigh_school');
            $table->string('program');
            $table->string('undergraduate_year');
            $table->string('student_classification');
            $table->string('registration_status');
            $table->string('guardian_name');
            $table->string('guardian_number');
            $table->string('guardian_occupation');
            $table->string('guardian_address');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->enum('role', ['superadmin', 'admin', 'student'])->default('student');
            $table->enum('status', ['active', 'inactive'])->default('active');  
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
