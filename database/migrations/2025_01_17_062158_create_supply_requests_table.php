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
        Schema::create('supply_requests', function (Blueprint $table) {
            $table->id();
            $table->string("item_name");
            $table->unsignedBigInteger("quantity");
            $table->datetime("datetime");
            $table->unsignedBigInteger("sanctuary_id");
            $table->unsignedBigInteger("caretaker_id");
            $table->foreign("sanctuary_id")->references("id")->on("sanctuaries")->onDelete("cascade");
            $table->foreign("caretaker_id")->references("id")->on("caretakers")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supply_requests');
    }
};
