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

            $table->dropColumn('overtime');
            $table->dropColumn('other_allowance');

            $table->dropColumn('salary_increase_option');
            $table->dropColumn('salary_increase_from');
            $table->dropColumn('salary_increase_to');

            $table->dropColumn('bonus_increase_option');
            $table->dropColumn('bonus_increase_from');
            $table->dropColumn('bonus_increase_to');
            $table->dropColumn('working_hour');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_posts', function (Blueprint $table) {
            //
        });
    }
};
