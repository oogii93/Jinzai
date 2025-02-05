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


            $table->enum('company_result_new', ['合格', '不合格', '辞退'])->nullable();
        });
        \DB::statement("UPDATE job_applications SET company_result_new = company_result");

        Schema::table('job_applications', function (Blueprint $table) {
            // Drop the old column
            $table->dropColumn('company_result');
        });

        Schema::table('job_applications', function (Blueprint $table) {
            // Rename the new column to the original name
            $table->renameColumn('company_result_new', 'company_result');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            // Revert back to the original enum values
            $table->enum('company_result', ['合格', '不合格'])->nullable();
        });
    }
};
