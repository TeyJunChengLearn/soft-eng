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
        Schema::create('medical_staff_verifications', function (Blueprint $table) {
            $table->id();
            $table->boolean("approval");
            $table->unsignedBigInteger("medical_staff_id");
            $table->unsignedBigInteger("manager_id");
            $table->foreign('medical_staff_id')->references('id')->on('medical_staffs')->onDelete("cascade");
            $table->foreign('manager_id')->references('id')->on('managers')->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_staff_verifications');
    }
};
