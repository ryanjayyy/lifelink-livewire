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
        Schema::create('unsafe_blood_bags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blood_bag_id');
            $table->unsignedBigInteger('reason_id');
            $table->string('remarks')->nullable(true);
            $table->timestamps();

            $table->foreign('blood_bag_id')->references('id')->on('blood_bags');
            $table->foreign('reason_id')->references('id')->on('unsafe_reasons');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unsafe_blood_bags');
    }
};
