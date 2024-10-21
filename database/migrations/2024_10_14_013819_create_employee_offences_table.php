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
        Schema::create('employee_offences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->foreign('employee_id')->references('id')->on('users');
            $table->unsignedBigInteger('c_id')->nullable();
            $table->foreign('c_id')->references('id')->on('company');
            $table->unsignedBigInteger('ug_id')->nullable();
            $table->foreign('ug_id')->references('id')->on('user_groups');
            $table->unsignedBigInteger('d_id')->nullable();
            $table->foreign('d_id')->references('id')->on('designations')->onDelete('cascade');
            $table->string('employee_name', 255)->nullable();
            $table->string('company', 255)->nullable();
            $table->string('department', 255)->nullable();
            $table->string('position', 255)->nullable();
            $table->date('date_committed', 255)->nullable();
            $table->string('type_of_offense', 255)->nullable();
            $table->string('policy_violated', 255)->nullable();
            $table->string('penalty', 255)->nullable();
            $table->string('decision_of_case', 255)->nullable();
            $table->string('eo_file', 255)->nullable();
            $table->string('eo_filename', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_offences');
    }
};
