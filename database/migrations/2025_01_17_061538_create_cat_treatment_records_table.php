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
        Schema::create('cat_treatment_records', function (Blueprint $table) {
            $table->id();
            $table->string('summary');
            $table->unsignedBigInteger('cat_health_record_id');
            $table->foreign('cat_health_record_id')->references('id')->on('cat_health_records')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cat_treatment_records');
    }
};
