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
        Schema::create('deferral_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('date_deffered');
            $table->unsignedBigInteger('deferral_type_id');
            $table->unsignedBigInteger('deferral_category_id');
            $table->string('other_reason')->nullable(true);
            $table->integer('deferral_duration')->nullable(true);
            $table->date('end_date')->nullable(true);
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('deferral_type_id')->references('id')->on('deferral_types');
            $table->foreign('deferral_category_id')->references('id')->on('deferral_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deferral_lists');
    }
};
