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
            // 1st method
            $table->bigInteger('job_id')->unsigned();
            // $table->unsignedBigInteger('job_id);
            // 2nd method
            // $table->foreignId('job_id')->constrained();
            $table->string('name');
            $table->text('about');
            $table->string('ceo');
            $table->integer('number_of_employees');
            $table->string('website_link');
            $table->string('street');
            $table->string('postal_code');
            $table->string('district');
            $table->string('regency');
            $table->string('province');
            $table->timestamps();

            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
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
