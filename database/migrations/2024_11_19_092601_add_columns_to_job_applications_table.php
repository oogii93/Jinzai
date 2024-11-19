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
        Schema::table('job_applications', function (Blueprint $table) {
            $table->timestamp('taisei_interview')->nullable();
            $table->enum('taisei_result',['合格','不合格'])->nullable();

            $table->enum('document_result',['合格','不合格'])->nullable();

            $table->timestamp('web_interview')->nullable();

            $table->timestamp('work_start')->nullable();






        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            //
        });
    }
};
