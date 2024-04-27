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
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('sex');
            $table->date('dob');
            $table->string('blood_type');
            $table->string('occupation')->nullable();
            $table->string('region');
            $table->string('province');
            $table->string('municipality');
            $table->string('barangay');
            $table->string('street');
            $table->string('zip_code');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
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
