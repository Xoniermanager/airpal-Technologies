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
        Schema::create('doctor_appointment_configs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('slot_duration');
            $table->integer('cleanup_interval')->nullable();
            $table->integer('start_month')->nullable();
            $table->integer('end_month')->nullable();
            $table->integer('slots_in_advance')->nullable();
            $table->date('start_slots_from_date')->nullable();
            $table->date('stop_slots_date')->nullable();
            $table->boolean('status')->default(true);
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_appointment_configs');
    }
};
