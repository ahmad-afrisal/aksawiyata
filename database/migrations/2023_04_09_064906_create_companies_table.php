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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug');
            $table->unsignedBigInteger('mentor_id');
            $table->unsignedBigInteger('examiner_id');
            $table->unsignedBigInteger('adviser_id');
            $table->text('about');
            $table->string('ceo');
            $table->integer('number_of_employees');
            $table->string('website_link');
            $table->string('street');
            $table->string('postal_code');
            $table->string('district');
            $table->string('regency');
            $table->string('province');
            $table->text('logo');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('mentor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('examiner_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('adviser_id')->references('id')->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
