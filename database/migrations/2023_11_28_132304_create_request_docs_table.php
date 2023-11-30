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
            $table->string('transNo')->unique();
            $table->date('dateReq');
            $table->string('aYear');
            $table->string('sem');
            $table->string('prog');
            $table->string('studentName');
            $table->string('studentNo');
            $table->string('req');
            $table->text('purpose');
            $table->string('totalPrice');
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
