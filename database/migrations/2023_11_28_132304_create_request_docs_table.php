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
        Schema::create('request_docs', function (Blueprint $table) {
            $table->id();
            $table->string('transNo')->unique()->default(0);
            $table->string('aYear')->nullable();
            $table->string('sem')->nullable();
            $table->string('prog')->nullable();
            $table->string('studentName')->nullable();
            $table->string('studentNo')->nullable();
            $table->string('req')->nullable();
            $table->string('status')->default('Pending');
            $table->text('purpose')->nullable();
            $table->string('totalPrice')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_docs');
    }
};
