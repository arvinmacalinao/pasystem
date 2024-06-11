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
        Schema::create('appraisal_ratings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('appraisal_id')->unsigned()->nullable();
            $table->foreign('appraisal_id')->references('id')->on('performance_appraisals');

            // Job Knowledge Rating
            $table->tinyInteger('jk_rating_1')->nullable();
            $table->tinyInteger('jk_rating_2')->nullable();
            $table->tinyInteger('jk_rating_3')->nullable();
            $table->tinyInteger('jk_rating_4')->nullable();
            $table->tinyInteger('jk_rating_5')->nullable();
            $table->tinyInteger('jk_rating_score')->nullable();
            $table->string('jk_rating_remarks', 255)->nullable();

            // Quality Rating
            $table->tinyInteger('quality_rating_1')->nullable();
            $table->tinyInteger('quality_rating_2')->nullable();
            $table->tinyInteger('quality_rating_3')->nullable();
            $table->tinyInteger('quality_rating_4')->nullable();
            $table->tinyInteger('quality_rating_5')->nullable();
            $table->tinyInteger('quality_rating_score')->nullable();
            $table->string('quality_rating_remarks', 255)->nullable();

            // Quantity Rating
            $table->tinyInteger('quantity_rating_1')->nullable();
            $table->tinyInteger('quantity_rating_2')->nullable();
            $table->tinyInteger('quantity_rating_3')->nullable();
            $table->tinyInteger('quantity_rating_4')->nullable();
            $table->tinyInteger('quantity_rating_5')->nullable();
            $table->tinyInteger('quantity_rating_score')->nullable();
            $table->string('quantity_rating_remarks', 255)->nullable();

            // Initiative Rating
            $table->tinyInteger('initiative_rating_1')->nullable();
            $table->tinyInteger('initiative_rating_2')->nullable();
            $table->tinyInteger('initiative_rating_3')->nullable();
            $table->tinyInteger('initiative_rating_4')->nullable();
            $table->tinyInteger('initiative_rating_5')->nullable();
            $table->tinyInteger('initiative_rating_score')->nullable();
            $table->string('initiative_rating_remarks', 255)->nullable();

            // Cooperation Rating
            $table->tinyInteger('coop_rating_1')->nullable();
            $table->tinyInteger('coop_rating_2')->nullable();
            $table->tinyInteger('coop_rating_3')->nullable();
            $table->tinyInteger('coop_rating_4')->nullable();
            $table->tinyInteger('coop_rating_5')->nullable();
            $table->tinyInteger('coop_rating_score')->nullable();
            $table->string('coop_rating_remarks', 255)->nullable();

            // Communications Rating
            $table->tinyInteger('comms_rating_1')->nullable();
            $table->tinyInteger('comms_rating_2')->nullable();
            $table->tinyInteger('comms_rating_3')->nullable();
            $table->tinyInteger('comms_rating_4')->nullable();
            $table->tinyInteger('comms_rating_5')->nullable();
            $table->tinyInteger('comms_rating_score')->nullable();
            $table->string('comms_rating_remarks', 255)->nullable();

            // Compliance Rating
            $table->tinyInteger('comp_rating_1')->nullable();
            $table->tinyInteger('comp_rating_2')->nullable();
            $table->tinyInteger('comp_rating_3')->nullable();
            $table->tinyInteger('comp_rating_4')->nullable();
            $table->tinyInteger('comp_rating_5')->nullable();
            $table->tinyInteger('comp_rating_6')->nullable();
            $table->tinyInteger('comp_rating_7')->nullable();
            $table->tinyInteger('comp_rating_score')->nullable();
            $table->string('comp_rating_remarks', 255)->nullable();

            // Attendance Rating
            $table->tinyInteger('attend_rating_1')->nullable();
            $table->tinyInteger('attend_rating_2')->nullable();
            $table->tinyInteger('attend_rating_3')->nullable();
            $table->tinyInteger('attend_rating_4')->nullable();
            $table->tinyInteger('attend_rating_5')->nullable();
            $table->tinyInteger('attend_rating_score')->nullable();
            $table->string('attend_rating_remarks', 255)->nullable();

            // Problem Solving Rating
            $table->tinyInteger('ps_rating_1')->nullable();
            $table->tinyInteger('ps_rating_2')->nullable();
            $table->tinyInteger('ps_rating_3')->nullable();
            $table->tinyInteger('ps_rating_4')->nullable();
            $table->tinyInteger('ps_rating_5')->nullable();
            $table->tinyInteger('ps_rating_score')->nullable();
            $table->string('ps_rating_remarks', 255)->nullable();

            // Innovation Solving Rating
            $table->tinyInteger('inno_rating_1')->nullable();
            $table->tinyInteger('inno_rating_2')->nullable();
            $table->tinyInteger('inno_rating_3')->nullable();
            $table->tinyInteger('inno_rating_4')->nullable();
            $table->tinyInteger('inno_rating_score')->nullable();
            $table->string('inno_rating_remarks', 255)->nullable();

            // Teamwork Solving Rating
            $table->tinyInteger('tw_rating_1')->nullable();
            $table->tinyInteger('tw_rating_2')->nullable();
            $table->tinyInteger('tw_rating_3')->nullable();
            $table->tinyInteger('tw_rating_4')->nullable();
            $table->tinyInteger('tw_rating_5')->nullable();
            $table->tinyInteger('tw_rating_score')->nullable();
            $table->string('tw_rating_remarks', 255)->nullable();

            // People Management
            $table->tinyInteger('pm_rating_1')->nullable();
            $table->tinyInteger('pm_rating_2')->nullable();
            $table->tinyInteger('pm_rating_3')->nullable();
            $table->tinyInteger('pm_rating_4')->nullable();
            $table->tinyInteger('pm_rating_5')->nullable();
            $table->tinyInteger('pm_rating_score')->nullable();
            $table->string('pm_rating_remarks', 255)->nullable();

            // Judgement
            $table->tinyInteger('judgment_rating_1')->nullable();
            $table->tinyInteger('judgment_rating_2')->nullable();
            $table->tinyInteger('judgment_rating_3')->nullable();
            $table->tinyInteger('judgment_rating_4')->nullable();
            $table->tinyInteger('judgment_rating_5')->nullable();
            $table->tinyInteger('judgment_rating_score')->nullable();
            $table->string('judgment_rating_remarks', 255)->nullable();

            // Compliance Rating
            $table->tinyInteger('management_rating_1')->nullable();
            $table->tinyInteger('management_rating_2')->nullable();
            $table->tinyInteger('management_rating_3')->nullable();
            $table->tinyInteger('management_rating_4')->nullable();
            $table->tinyInteger('management_rating_5')->nullable();
            $table->tinyInteger('management_rating_6')->nullable();
            $table->tinyInteger('management_rating_7')->nullable();
            $table->tinyInteger('management_rating_score')->nullable();
            $table->string('management_rating_remarks', 255)->nullable();

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
            $table->tinyInteger('late_rating_score')->nullable();
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
            $table->tinyInteger('ut_rating_score')->nullable();
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
            $table->tinyInteger('ul_rating_score')->nullable();
            $table->tinyInteger('attend_b_rating_score')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appraisal_ratings');
    }
};
