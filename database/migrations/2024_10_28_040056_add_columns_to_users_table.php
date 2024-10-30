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
        Schema::table('users', function (Blueprint $table) {

            $table->string('furigana')->nullable();
            $table->string('profile_image')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('mobile_number')->nullable();

              // Add education-related fields
              $table->integer('education_year_1')->nullable();
              $table->integer('education_month_1')->nullable();
              $table->string('education_school_1')->nullable();

              $table->integer('education_year_2')->nullable();
              $table->integer('education_month_2')->nullable();
              $table->string('education_school_2')->nullable();

              $table->integer('education_year_3')->nullable();
              $table->integer('education_month_3')->nullable();
              $table->string('education_school_3')->nullable();

              $table->text('appear_point')->nullable();
              $table->text('study_japan')->nullable();
              $table->string('skill')->nullable();
              $table->text('reason')->nullable();
              $table->string('language')->nullable();
              $table->string('license')->nullable();
              $table->string('hobby')->nullable();
              $table->text('part_time')->nullable();




        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
