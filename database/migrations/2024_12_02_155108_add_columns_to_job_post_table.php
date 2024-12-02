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
            $table->integer('salary_deadline')->nullable();
            $table->enum('salary_payment_month', ['当月','翌月'])->nullable();

            $table->integer('salary_payment_day')->nullable();
            $table->enum('smoke_option', ['可','不可'])->nullable();
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
