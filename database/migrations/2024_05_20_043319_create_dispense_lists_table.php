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
        Schema::create('dispense_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blood_bag_id');
            $table->unsignedBigInteger('patient_details_id');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('blood_bag_id')->references('id')->on('blood_bags');
            $table->foreign('patient_details_id')->references('id')->on('patient_details');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispense_maps');
    }
};
