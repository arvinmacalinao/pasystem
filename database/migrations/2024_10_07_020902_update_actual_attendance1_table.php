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
            $table->unsignedTinyInteger('start_month')->nullable()->after('attend_b_rating_score');
            $table->unsignedTinyInteger('end_month')->nullable()->after('start_month');  
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
