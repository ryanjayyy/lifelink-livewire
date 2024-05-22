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
        Schema::create('audit_trails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('module_category_id');
            $table->string('action');
            $table->string('status');
            $table->string('ip_address');
            $table->string('region');
            $table->string('city');
            $table->string('postal');
            $table->string('latitude');
            $table->string('longitude');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('module_category_id')->references('id')->on('module_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_trail');
    }
};
