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
        Schema::create('final_grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('appraisal1_id')->nullable();
            $table->unsignedBigInteger('appraisal2_id')->nullable();
            $table->unsignedBigInteger('attendance_id')->nullable();
            $table->bigInteger('period_id')->unsigned()->nullable();
            
            $table->year('year');
            $table->decimal('appraisal1_score', 8, 2)->nullable();
            $table->decimal('appraisal2_score', 8, 2)->nullable();
            $table->decimal('attendance_score', 8, 2)->nullable();
            $table->decimal('final_score', 8, 2)->nullable();
            $table->timestamps();
            
            $table->foreign('period_id')->references('id')->on('appraisal_period');
            $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('appraisal1_id')->references('id')->on('performance_appraisals')->onDelete('set null');
            $table->foreign('appraisal2_id')->references('id')->on('performance_appraisals')->onDelete('set null');
            $table->foreign('attendance_id')->references('id')->on('actual_attendance')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_grades');
    }
};
