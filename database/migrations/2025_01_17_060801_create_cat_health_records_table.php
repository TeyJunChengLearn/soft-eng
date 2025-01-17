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
        Schema::create('cat_health_records', function (Blueprint $table) {
            $table->id();
            $table->datetime("datetime");
            $table->string("summary",5000);
            $table->unsignedBigInteger("medical_staff_id");
            $table->unsignedBigInteger("cat_id");
            $table->foreign("medical_staff_id")->references("id")->on("medical_staffs")->onDelete("cascade");
            $table->foreign("cat_id")->references("id")->on("cats")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cat_health_records');
    }
};
