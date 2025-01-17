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
        Schema::create('admin_activity_histories', function (Blueprint $table) {
            $table->id();
            $table->string("details",5000);
            $table->datetime("datetime");
            $table->unsignedBigInteger("admin_id");
            $table->foreign("admin_id")->references("id")->on("admins")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_activity_histories');
    }
};
