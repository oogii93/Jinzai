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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_post_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('admin_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->enum('company_status', ['pending','under_review', 'accepted','rejected'])->default('pending');
            $table->text('admin_remarks')->nullable();
            $table->text('cover_letter')->nullable();
            $table->string('resume_path')->nullable();

            $table->timestamps();

            $table->foreign('job_post_id')->references('id')->on('job_post')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
