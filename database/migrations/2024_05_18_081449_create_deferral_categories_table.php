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
        Schema::create('deferral_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('deferral_type_id');
            $table->string('category');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('deferral_type_id')->references('id')->on('deferral_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deferral_categories');
    }
};
