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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('nim_mhs',8);
            $table->string('nama_mhs',8);
            $table->string('angkatan_mhs');
            $table->string('prodi_mhs');
            $table->boolean('status_mhs');
            $table->string('concentration');
            $table->text('about');
            $table->string('phone_number');
            $table->string('instagram_profile');
            $table->string('linkedin_profile');
            $table->string('github_profile');
            $table->string('transkip');
            $table->string('cv');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
