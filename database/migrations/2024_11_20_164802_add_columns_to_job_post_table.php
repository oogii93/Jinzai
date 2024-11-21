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
        Schema::table('job_post', function (Blueprint $table) {
            $table->string('title')->nullable();

            $table->enum('working_hour',['固定','シフト制'])->nullable();
                $table->string('working_hour_a')->nullable();
                $table->string('working_hour_b_1')->nullable();
                $table->string('working_hour_b_2')->nullable();
                $table->string('working_hour_b_3')->nullable();
            $table->string('holiday_type')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_post', function (Blueprint $table) {
            //
        });
    }
};
