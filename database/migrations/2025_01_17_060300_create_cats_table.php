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
        Schema::create('cats', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean("gender");
            $table->string("breed");
            $table->date("birthdate");
            $table->string("general_story",5000);
            $table->unsignedBigInteger("sanctuary_id");
            $table->foreign("sanctuary_id")->references('id')->on("sanctuaries")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cats');
    }
};
