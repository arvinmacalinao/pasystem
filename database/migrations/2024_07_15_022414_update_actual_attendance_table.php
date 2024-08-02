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
        Schema::table('actual_attendance', function (Blueprint $table) {
            $table->tinyInteger('late_start_month')->nullable()->after('period_id');
            $table->tinyInteger('ut_start_month')->nullable()->after('late_rating_score');
            $table->tinyInteger('ul_start_month')->nullable()->after('ut_rating_score');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('actual_attendance', function (Blueprint $table) {
            //
        });
    }
};
