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
        Schema::create('admin_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blood_request_id');
            $table->unsignedBigInteger('blood_type_id');
            $table->timestamp('donation_date');
            $table->unsignedBigInteger('venue_id');
            $table->text('message');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('blood_request_id')->references('id')->on('blood_requests');
            $table->foreign('blood_type_id')->references('id')->on('blood_types');
            $table->foreign('venue_id')->references('id')->on('venues');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_posts');
    }
};
