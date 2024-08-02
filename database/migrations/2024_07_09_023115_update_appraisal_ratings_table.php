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
            $table->string('evaluator_recommendation', 255)->nullable()->after('appraisal_rating_score');
            $table->bigInteger('form_id')->unsigned()->nullable()->after('appraisal_id');
            $table->foreign('form_id')->references('id')->on('appraisal_forms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appraisal_ratings', function (Blueprint $table) {
            //
        });
    }
};
