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
        Schema::create('request_interested_donors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_post_id');
            $table->unsignedBigInteger('blood_request_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('admin_post_id')->references('id')->on('admin_posts');
            $table->foreign('blood_request_id')->references('id')->on('blood_requests');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_interested_donors');
    }
};
