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
        Schema::table('performance_appraisals', function (Blueprint $table) {
            $table->string('pa_file', 255)->nullable();
            $table->string('pa_filename', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('performance_appraisals', function (Blueprint $table) {
            
        });
    }
};
