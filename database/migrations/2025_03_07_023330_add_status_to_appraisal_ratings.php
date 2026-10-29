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
        Schema::table('appraisal_ratings', function (Blueprint $table) {
            $table->string('status')->default('draft')->after('jk_rating_remarks'); // Add status column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appraisal_ratings', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
