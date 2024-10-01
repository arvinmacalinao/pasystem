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
        Schema::create('job_level', function (Blueprint $table) {
            $table->unsignedTinyInteger('id')->autoIncrement(); // Primary key using tinyint
            $table->string('name'); // Name of the job level (e.g., Junior, Senior, etc.)
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_level');
    }
};
