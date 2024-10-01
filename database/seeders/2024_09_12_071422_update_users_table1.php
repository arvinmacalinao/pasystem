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
        Schema::table('users', function (Blueprint $table) {
             // Make sure job_level is an unsignedTinyInteger
            $table->unsignedTinyInteger('job_level')->change();
            $table->boolean('first_login')->default(true);
                
            // Add foreign key constraint
            $table->foreign('job_level')->references('id')->on('job_level')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
