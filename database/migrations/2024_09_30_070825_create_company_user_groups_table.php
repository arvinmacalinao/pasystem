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
        Schema::create('company_user_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('c_id'); // Company ID
            $table->unsignedBigInteger('ug_id'); // User Group ID
            $table->foreign('c_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('ug_id')->references('id')->on('user_groups')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_user_groups');
    }
};