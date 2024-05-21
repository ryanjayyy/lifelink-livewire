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
        Schema::create('blood_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('blood_units');
            $table->unsignedBigInteger('blood_component_id');
            $table->string('diagnosis');
            $table->string('hospital');
            $table->date('transfusion_date');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('blood_component_id')->references('id')->on('blood_components');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_requests');
    }
};
