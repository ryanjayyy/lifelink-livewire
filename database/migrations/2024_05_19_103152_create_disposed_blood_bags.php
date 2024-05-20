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
        Schema::create('disposed_blood_bags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blood_bag_id');
            $table->timestamp('disposed_date');
            $table->unsignedBigInteger('dispose_by');
            $table->unsignedBigInteger('dispose_classification_id');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('dispose_classification_id')->references('id')->on('dispose_classifications');
            $table->foreign('blood_bag_id')->references('id')->on('blood_bags');
            $table->foreign('dispose_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expired_blood_bags');
    }
};
