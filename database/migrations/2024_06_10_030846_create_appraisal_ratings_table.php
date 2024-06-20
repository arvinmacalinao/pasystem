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
            $table->decimal('jk_rating_score', 8, 2)->nullable();
            $table->string('jk_rating_remarks', 255)->nullable();

            // Quality Rating
            $table->tinyInteger('quality_rating_1')->nullable();
            $table->tinyInteger('quality_rating_2')->nullable();
            $table->tinyInteger('quality_rating_3')->nullable();
            $table->tinyInteger('quality_rating_4')->nullable();
            $table->tinyInteger('quality_rating_5')->nullable();
            $table->decimal('quality_rating_score', 8, 2)->nullable();
            $table->string('quality_rating_remarks', 255)->nullable();

            // Quantity Rating
            $table->tinyInteger('quantity_rating_1')->nullable();
            $table->tinyInteger('quantity_rating_2')->nullable();
            $table->tinyInteger('quantity_rating_3')->nullable();
            $table->tinyInteger('quantity_rating_4')->nullable();
            $table->tinyInteger('quantity_rating_5')->nullable();
            $table->decimal('quantity_rating_score', 8, 2)->nullable();
            $table->string('quantity_rating_remarks', 255)->nullable();

            // Initiative Rating
            $table->tinyInteger('initiative_rating_1')->nullable();
            $table->tinyInteger('initiative_rating_2')->nullable();
            $table->tinyInteger('initiative_rating_3')->nullable();
            $table->tinyInteger('initiative_rating_4')->nullable();
            $table->tinyInteger('initiative_rating_5')->nullable();
            $table->decimal('initiative_rating_score', 8, 2)->nullable();
            $table->string('initiative_rating_remarks', 255)->nullable();

            // Cooperation Rating
            $table->tinyInteger('coop_rating_1')->nullable();
            $table->tinyInteger('coop_rating_2')->nullable();
            $table->tinyInteger('coop_rating_3')->nullable();
            $table->tinyInteger('coop_rating_4')->nullable();
            $table->tinyInteger('coop_rating_5')->nullable();
            $table->decimal('coop_rating_score', 8, 2)->nullable();
            $table->string('coop_rating_remarks', 255)->nullable();

            // Communications Rating
            $table->tinyInteger('comms_rating_1')->nullable();
            $table->tinyInteger('comms_rating_2')->nullable();
            $table->tinyInteger('comms_rating_3')->nullable();
            $table->tinyInteger('comms_rating_4')->nullable();
            $table->tinyInteger('comms_rating_5')->nullable();
            $table->decimal('comms_rating_score', 8, 2)->nullable();
            $table->string('comms_rating_remarks', 255)->nullable();

            // Compliance Rating
            $table->tinyInteger('comp_rating_1')->nullable();
            $table->tinyInteger('comp_rating_2')->nullable();
            $table->tinyInteger('comp_rating_3')->nullable();
            $table->tinyInteger('comp_rating_4')->nullable();
            $table->tinyInteger('comp_rating_5')->nullable();
            $table->tinyInteger('comp_rating_6')->nullable();
            $table->tinyInteger('comp_rating_7')->nullable();
            $table->decimal('comp_rating_score', 8, 2)->nullable();
            $table->string('comp_rating_remarks', 255)->nullable();

            // Attendance Rating
            $table->tinyInteger('attend_rating_1')->nullable();
            $table->tinyInteger('attend_rating_2')->nullable();
            $table->tinyInteger('attend_rating_3')->nullable();
            $table->tinyInteger('attend_rating_4')->nullable();
            $table->tinyInteger('attend_rating_5')->nullable();
            $table->decimal('attend_rating_score', 8, 2)->nullable();
            $table->string('attend_rating_remarks', 255)->nullable();

            // Problem Solving Rating
            $table->tinyInteger('ps_rating_1')->nullable();
            $table->tinyInteger('ps_rating_2')->nullable();
            $table->tinyInteger('ps_rating_3')->nullable();
            $table->tinyInteger('ps_rating_4')->nullable();
            $table->tinyInteger('ps_rating_5')->nullable();
            $table->decimal('ps_rating_score', 8, 2)->nullable();
            $table->string('ps_rating_remarks', 255)->nullable();

            // Innovation Solving Rating
            $table->tinyInteger('inno_rating_1')->nullable();
            $table->tinyInteger('inno_rating_2')->nullable();
            $table->tinyInteger('inno_rating_3')->nullable();
            $table->tinyInteger('inno_rating_4')->nullable();
            $table->decimal('inno_rating_score', 8, 2)->nullable();
            $table->string('inno_rating_remarks', 255)->nullable();

            // Teamwork Solving Rating
            $table->tinyInteger('tw_rating_1')->nullable();
            $table->tinyInteger('tw_rating_2')->nullable();
            $table->tinyInteger('tw_rating_3')->nullable();
            $table->tinyInteger('tw_rating_4')->nullable();
            $table->tinyInteger('tw_rating_5')->nullable();
            $table->decimal('tw_rating_score', 8, 2)->nullable();
            $table->string('tw_rating_remarks', 255)->nullable();

            // People Management
            $table->tinyInteger('pm_rating_1')->nullable();
            $table->tinyInteger('pm_rating_2')->nullable();
            $table->tinyInteger('pm_rating_3')->nullable();
            $table->tinyInteger('pm_rating_4')->nullable();
            $table->tinyInteger('pm_rating_5')->nullable();
            $table->decimal('pm_rating_score', 8, 2)->nullable();
            $table->string('pm_rating_remarks', 255)->nullable();

            // Judgement
            $table->tinyInteger('judgment_rating_1')->nullable();
            $table->tinyInteger('judgment_rating_2')->nullable();
            $table->tinyInteger('judgment_rating_3')->nullable();
            $table->tinyInteger('judgment_rating_4')->nullable();
            $table->tinyInteger('judgment_rating_5')->nullable();
            $table->decimal('judgment_rating_score', 8, 2)->nullable();
            $table->string('judgment_rating_remarks', 255)->nullable();

            // Compliance Rating
            $table->tinyInteger('management_rating_1')->nullable();
            $table->tinyInteger('management_rating_2')->nullable();
            $table->tinyInteger('management_rating_3')->nullable();
            $table->tinyInteger('management_rating_4')->nullable();
            $table->tinyInteger('management_rating_5')->nullable();
            $table->tinyInteger('management_rating_6')->nullable();
            $table->tinyInteger('management_rating_7')->nullable();
            $table->decimal('management_rating_score', 8, 2)->nullable();
            $table->string('management_rating_remarks', 255)->nullable();

            $table->timestamps();
            $table->softDeletes();
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
