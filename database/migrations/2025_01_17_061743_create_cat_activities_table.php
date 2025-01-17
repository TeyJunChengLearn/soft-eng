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
        Schema::create('cat_activities', function (Blueprint $table) {
            $table->id();
            $table->datetime("datetime");
            $table->string("summary",5000);
            $table->unsignedBigInteger("cat_id");
            $table->unsignedBigInteger("caretaker_id");
            $table->foreign("cat_id")->references("id")->on("cats")->onDelete("cascade");
            $table->foreign("caretaker_id")->references("id")->on("caretakers")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cat_activities');
    }
};
