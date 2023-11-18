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
            $table->string('studentNumber');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('middleName');
            $table->string('suffix')->nullable();
            $table->string('street');
            $table->string('barangay');
            $table->string('municipality');
            $table->string('province');
            $table->date('dateOfBirth');
            $table->string('gender');
            $table->string('religion');
            $table->string('citizenship');
            $table->string('status');
            $table->string('guardian')->nullable();
            $table->string('mobilePhone');
            $table->string('email')->unique();
            $table->string('yearAdmitted')->nullable();
            $table->string('semesterAdmitted')->nullable();
            $table->string('course')->nullable();
            $table->string('cardNumber')->nullable();
            $table->integer('studentincrement')->nullable();
            $table->integer('lastupdate')->nullable();
            $table->string('highschool')->nullable();
            $table->string('curriculumid')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->enum('role', ['superadmin', 'admin', 'student'])->default('student');
            $table->boolean('isActive') ->default(1);  
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
