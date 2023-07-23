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
            $table->string('nim_mhs',8)->nullable();
            $table->string('nama_mhs');
            $table->string('angkatan_mhs')->nullable();
            $table->string('prodi_mhs')->nullable();
            $table->boolean('status_mhs')->default(1);
            $table->string('concentration')->nullable();
            $table->text('about')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('instagram_profile')->nullable();
            $table->string('linkedin_profile')->nullable();
            $table->string('github_profile')->nullable();
            $table->string('transkip')->nullable();
            $table->string('cv')->nullable();
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
