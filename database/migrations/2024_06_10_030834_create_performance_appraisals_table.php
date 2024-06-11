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
        Schema::create('performance_appraisals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id')->unsigned()->nullable();
            $table->foreign('employee_id')->references('id')->on('users');
            $table->bigInteger('evaluator_id')->unsigned()->nullable();
            $table->foreign('evaluator_id')->references('id')->on('users');
            $table->date('evaluation_date');
            $table->bigInteger('period_id')->unsigned()->nullable();
            $table->foreign('period_id')->references('id')->on('appraisal_period');
            $table->string('evaluator_remarks',255)->nullable();
            $table->string('employee_remarks',255)->nullable();
            $talbe->
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performance_appraisals');
    }
};
