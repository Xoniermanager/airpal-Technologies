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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_slot_id');
            $table->foreign('booking_slot_id')->references('id')->on('booking_slots');
            $table->tinyText('description')->nullable();
            $table->tinyText('diagnosis')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->tinyText('advice')->nullable();
            $table->date('follow_up')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};
