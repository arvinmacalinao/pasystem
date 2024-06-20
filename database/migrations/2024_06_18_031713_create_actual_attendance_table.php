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
        Schema::create('actual_attendance', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id')->unsigned()->nullable();
            $table->foreign('employee_id')->references('id')->on('users');
            $table->bigInteger('encoder_id')->unsigned()->nullable();
            $table->foreign('encoder_id')->references('id')->on('users');
            $table->bigInteger('period_id')->unsigned()->nullable();
            $table->foreign('period_id')->references('id')->on('appraisal_period');
            // Attendance HR
            // late
            $table->tinyInteger('late_rating_1')->nullable();
            $table->tinyInteger('late_rating_2')->nullable();
            $table->tinyInteger('late_rating_3')->nullable();
            $table->tinyInteger('late_rating_4')->nullable();
            $table->tinyInteger('late_rating_5')->nullable();
            $table->tinyInteger('late_rating_6')->nullable();
            $table->tinyInteger('da_records_late_1')->nullable();
            $table->tinyInteger('da_records_late_2')->nullable();
            $table->tinyInteger('da_records_late_3')->nullable();
            $table->tinyInteger('da_records_late_4')->nullable();
            $table->tinyInteger('da_records_late_5')->nullable();
            $table->tinyInteger('da_records_late_6')->nullable();
            $table->decimal('late_rating_score', 8, 2)->nullable();
            // undertime
            $table->tinyInteger('ut_rating_1')->nullable();
            $table->tinyInteger('ut_rating_2')->nullable();
            $table->tinyInteger('ut_rating_3')->nullable();
            $table->tinyInteger('ut_rating_4')->nullable();
            $table->tinyInteger('ut_rating_5')->nullable();
            $table->tinyInteger('ut_rating_6')->nullable();
            $table->tinyInteger('da_records_ut_1')->nullable();
            $table->tinyInteger('da_records_ut_2')->nullable();
            $table->tinyInteger('da_records_ut_3')->nullable();
            $table->tinyInteger('da_records_ut_4')->nullable();
            $table->tinyInteger('da_records_ut_5')->nullable();
            $table->tinyInteger('da_records_ut_6')->nullable();
            $table->decimal('ut_rating_score', 8, 2)->nullable();
            // unscheduled leave
            $table->tinyInteger('ul_rating_1')->nullable();
            $table->tinyInteger('ul_rating_2')->nullable();
            $table->tinyInteger('ul_rating_3')->nullable();
            $table->tinyInteger('ul_rating_4')->nullable();
            $table->tinyInteger('ul_rating_5')->nullable();
            $table->tinyInteger('ul_rating_6')->nullable();
            $table->tinyInteger('da_records_ul_1')->nullable();
            $table->tinyInteger('da_records_ul_2')->nullable();
            $table->tinyInteger('da_records_ul_3')->nullable();
            $table->tinyInteger('da_records_ul_4')->nullable();
            $table->tinyInteger('da_records_ul_5')->nullable();
            $table->tinyInteger('da_records_ul_6')->nullable();
            $table->decimal('ul_rating_score', 8, 2)->nullable();

            $table->decimal('attend_b_rating_score')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actual_attendance');
    }
};
