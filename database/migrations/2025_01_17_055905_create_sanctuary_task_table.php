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
        Schema::create('sanctuary_task', function (Blueprint $table) {
            $table->id();
            $table->dateTime("datetime");
            $table->string("summary",5000);
            $table->unsignedBigInteger("sanctuary_id");
            $table->unsignedBigInteger("caretaker_id");
            $table->foreign("sanctuary_id")->references('id')->on("sanctuaries")->noDelete("cascade");
            $table->foreign("caretaker_id")->references('id')->on("caretakers")->noDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanctuary_task');
    }
};
