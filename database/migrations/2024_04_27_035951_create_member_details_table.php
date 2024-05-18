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
        Schema::create('member_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('donor_number')->unique();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->unsignedBigInteger('sex_id');
            $table->date('dob');
            $table->unsignedBigInteger('blood_type_id');
            $table->string('occupation')->nullable();
            $table->unsignedBigInteger('region');
            $table->unsignedBigInteger('province');
            $table->unsignedBigInteger('municipality');
            $table->unsignedBigInteger('barangay');
            $table->string('street');
            $table->string('zip_code');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('sex_id')->references('id')->on('sexes');
            $table->foreign('blood_type_id')->references('id')->on('blood_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_details');
    }
};
