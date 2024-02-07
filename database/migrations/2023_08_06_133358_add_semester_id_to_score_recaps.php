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
        Schema::table('score_recaps', function (Blueprint $table) {
            $table->foreignId('semester_id')->constrained()->after('user_id');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('score_recaps', function (Blueprint $table) {
            $table->dropColumn(['semester_id']);
            
        });
    }
};
