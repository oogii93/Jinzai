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
            $table->string('company_name')->nullable();
            $table->string('company_furigana')->nullable();
            $table->string('company_address')->nullable();
            $table->string('homepage_url')->nullable();
            $table->string('type')->nullable();
            $table->enum('my_car',['可','不可'])->nullable();
            $table->string('trial_period')->nullable();
            $table->string('overtime')->nullable();
            $table->string('other_allowance')->nullable();

            $table->enum('salary_increase_option', ['可','不可'])->default('不可');
                $table->string('salary_increase_from')->nullable();
                $table->string('salary_increase_to')->nullable();

            $table->enum('bonus_increase_option', ['可','不可'])->default('不可');
                $table->string('bonus_increase_from')->nullable();
                $table->string('bonus_increase_to')->nullable();

            $table->string('overtime_hour')->nullable();
            $table->string('break')->nullable();
            $table->string('holidays')->nullable();
            $table->string('insurance')->nullable();
            $table->enum('fire_option', ['可','不可'])->nullable();
            $table->enum('house_option', ['可','不可'])->nullable();
            $table->enum('childcare_option', ['可','不可'])->nullable();
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
