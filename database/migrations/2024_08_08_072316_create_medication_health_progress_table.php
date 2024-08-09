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
        Schema::create('medication_health_progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_diary_id');
            $table->foreign('patient_diary_id')->references('id')->on('patient_diaries');
            $table->enum('health_progress', ['Feeling Good', 'Feeling Better', 'Not Good', 'No Changes At All'])->nullable();
            $table->tinyText('side_effect')->nullable();
            $table->tinyText('improvement')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medication_health_progress');
    }
};
