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
        Schema::create('patient_diaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('users');
            $table->text('note');
            $table->float('total_sleep_hr');
            $table->boolean('morning_breakfast');
            $table->boolean('afternoon_lunch');
            $table->boolean('night_dinner');
            $table->boolean('morning_medicine');
            $table->boolean('afternoon_medicine');
            $table->boolean('night_medicine');
            $table->float('pulse_rate')->nullable();
            $table->float('oxygen_level')->nullable();
            $table->float('weight')->nullable();
            $table->float('bp')->nullable();
            $table->float('avg_body_temp')->nullable();
            $table->float('avg_heart_beat')->nullable();
            $table->float('glucose')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_diaries');
    }
};
