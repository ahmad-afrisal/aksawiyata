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
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('nidn_dosen')->nullable();
            $table->string('nip_dosen')->nullable();      
            $table->string('nama_dosen')->nullable();      
            $table->integer('status_dosen')->nullable();      
            $table->integer('konsentrasi_dosen')->nullable();      
            $table->integer('jafung_dosen')->nullable();      
            $table->string('hp_dosen')->nullable();      
            $table->string('prodi_dosen')->nullable();      
            $table->integer('aktif')->nullable()->default(1);      
            $table->string('bidang_peminatan')->nullable();      
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lectures');
    }
};
