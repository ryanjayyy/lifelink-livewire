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
        Schema::create('blood_bags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('donation_type_id');
            $table->unsignedBigInteger('venue_id');
            $table->unsignedBigInteger('bled_by_id');
            //$table->unsignedBigInteger('patient_receivers_id');
            $table->string('serial_no')->unique();
            $table->date('date_donated');
            $table->date('expiration_date');
            $table->boolean('isCollected')->default(True);
            $table->boolean('isTested')->default(false);
            $table->boolean('isStored')->default(false);
            $table->boolean('isUsed')->default(false);
            $table->boolean('isExpired')->default(false);
            $table->boolean('isUnsafe')->default(false);
            $table->boolean('isDisposed')->default(false);
            $table->date('dispensed_date')->nullable(true);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('donation_type_id')->references('id')->on('donation_types');
            $table->foreign('venue_id')->references('id')->on('venues');
            $table->foreign('bled_by_id')->references('id')->on('users');
            //$table->foreign('patient_receivers_id')->references('id')->on('patient_receivers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_bags');
    }
};
