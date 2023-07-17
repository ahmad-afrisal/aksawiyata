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
        Schema::create('examinees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('exam_id');
            $table->unsignedBigInteger('checkout_id');
            $table->unsignedBigInteger('adviser_id')->nullable();
            $table->boolean('is_accepted')->default('0');
            $table->timestamps();
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('checkout_id')->references('id')->on('checkouts')->onDelete('cascade');
            $table->foreign('exam_id')->references('id')->on('exam_schedules')->onDelete('cascade');
            $table->foreign('adviser_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examinees');
    }
};
