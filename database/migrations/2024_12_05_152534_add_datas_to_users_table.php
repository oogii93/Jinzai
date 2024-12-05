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

               $table->string('education_startEnd_1')->nullable();
               $table->string('education_startEnd_2')->nullable();
               $table->string('education_startEnd_3')->nullable();

               $table->integer('education_year_4')->nullable();
               $table->integer('education_month_4')->nullable();
               $table->string('education_school_4')->nullable();
               $table->string('education_startEnd_4')->nullable();

               $table->integer('education_year_5')->nullable();
               $table->integer('education_month_5')->nullable();
               $table->string('education_school_5')->nullable();
               $table->string('education_startEnd_5')->nullable();

               $table->integer('education_year_6')->nullable();
               $table->integer('education_month_6')->nullable();
               $table->string('education_school_6')->nullable();
               $table->string('education_startEnd_6')->nullable();


               $table->integer('education_year_7')->nullable();
               $table->integer('education_month_7')->nullable();
               $table->string('education_school_7')->nullable();
               $table->string('education_startEnd_7')->nullable();


               $table->integer('education_year_8')->nullable();
               $table->integer('education_month_8')->nullable();
               $table->string('education_school_8')->nullable();
               $table->string('education_startEnd_8')->nullable();


               $table->integer('education_year_9')->nullable();
               $table->integer('education_month_9')->nullable();
               $table->string('education_school_9')->nullable();
               $table->string('education_startEnd_9')->nullable();


               $table->integer('education_year_10')->nullable();
               $table->integer('education_month_10')->nullable();
               $table->string('education_school_10')->nullable();
               $table->string('education_startEnd_10')->nullable();


               $table->integer('education_year_11')->nullable();
               $table->integer('education_month_11')->nullable();
               $table->string('education_school_11')->nullable();
               $table->string('education_startEnd_11')->nullable();


               $table->integer('education_year_12')->nullable();
               $table->integer('education_month_12')->nullable();
               $table->string('education_school_12')->nullable();
               $table->string('education_startEnd_12')->nullable();


               $table->integer('education_year_13')->nullable();
               $table->integer('education_month_13')->nullable();
               $table->string('education_school_13')->nullable();
               $table->string('education_startEnd_13')->nullable();


               $table->integer('education_year_14')->nullable();
               $table->integer('education_month_14')->nullable();
               $table->string('education_school_14')->nullable();
               $table->string('education_startEnd_14')->nullable();


               $table->integer('education_year_15')->nullable();
               $table->integer('education_month_15')->nullable();
               $table->string('education_school_15')->nullable();
               $table->string('education_startEnd_15')->nullable();




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
