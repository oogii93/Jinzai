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

            $table->unsignedBigInteger('company_result_updated_by')->nullable();
            $table->timestamp('company_result_updated_at')->nullable();

            $table->unsignedBigInteger('document_result_updated_by')->nullable();
            $table->timestamp('document_result_updated_at')->nullable();

            $table->unsignedBigInteger('web_interview_updated_by')->nullable();
            $table->timestamp('web_interview_updated_at')->nullable();

            $table->unsignedBigInteger('work_start_updated_by')->nullable();
            $table->timestamp('work_start_updated_at')->nullable();

            $table->foreign('company_result_updated_by')->references('id')->on('users');
$table->foreign('document_result_updated_by')->references('id')->on('users');
$table->foreign('web_interview_updated_by')->references('id')->on('users');
$table->foreign('work_start_updated_by')->references('id')->on('users');




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
