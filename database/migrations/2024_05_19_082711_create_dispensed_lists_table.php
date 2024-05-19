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
        Schema::create('dispensed_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blood_bag_id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->date('dob');
            $table->unsignedBigInteger('sex_id');
            $table->unsignedBigInteger('blood_type_id');
            $table->string('diagnosis');
            $table->unsignedBigInteger('hospital_id');
            $table->timestamps();

            $table->foreign('blood_type_id')->references('id')->on('blood_types');
            $table->foreign('blood_bag_id')->references('id')->on('blood_bags');
            $table->foreign('hospital_id')->references('id')->on('hospitals');
            $table->foreign('sex_id')->references('id')->on('sexes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispensed_lists');
    }
};