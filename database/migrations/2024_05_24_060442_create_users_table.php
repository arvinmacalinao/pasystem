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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 255);
            $table->string('middle_name')->nullable();
            $table->string('last_name', 255);
            $table->string('username', 255);
            $table->string('email', 255)->unique()->nullable();
            $table->string('password', 255);
            $table->string('employee_code', 255)->nullable();
            $table->date('date_hired')->nullable();
            $table->date('date_regular')->nullable();
            $table->date('date_separated')->nullable();
            $table->string('location', 255)->nullable();
            $table->bigInteger('es_id')->unsigned()->nullable();
            $table->foreign('es_id')->references('id')->on('employment_status');
            $table->bigInteger('is_id')->unsigned()->nullable();
            $table->foreign('is_id')->references('id')->on('users');
            $table->bigInteger('fr_id')->unsigned()->nullable();
            $table->foreign('fr_id')->references('id')->on('users');
            $table->unsignedTinyInteger('job_level')->nullable();
            $table->foreign('job_level')->references('id')->on('job_level')->onDelete('cascade');
            $table->bigInteger('ug_id')->unsigned()->nullable();
            $table->foreign('ug_id')->references('id')->on('user_groups');
            $table->bigInteger('r_id')->unsigned()->nullable();
            $table->foreign('r_id')->references('id')->on('roles');
            $table->bigInteger('c_id')->unsigned()->nullable();
            $table->foreign('c_id')->references('id')->on('company');
            $table->tinyInteger('u_enabled')->default(0);
            $table->tinyInteger('u_active')->default(0); 
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
