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
            //
            $table->string('period', 255)->nullable()->after('employee_remarks');
            $table->string('name', 255)->nullable()->after('period');
            $table->string('company', 255)->nullable()->after('name');
            $table->string('group', 255)->nullable()->after('company');
            $table->string('designation', 255)->nullable()->after('group');
            $table->string('job_rank', 255)->nullable()->after('designation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('performance_appraisals', function (Blueprint $table) {
            //
        });
    }
};
