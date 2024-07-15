<?php

use Illuminate\Console\View\Components\Confirm;
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
        Schema::create('booking_slots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->date('booking_date');
            $table->time('slot_start_time');
            $table->time('slot_end_time');
            $table->string('note')->nullable();
            $table->string('attachments')->nullable();
            $table->string('insurance')->nullable();
            $table->string('symptoms')->nullable();

            $table->enum('status',['requested','confirm','canceled']);
            $table->timestamps();

            // $table->foreign('patient_id')->references('id')->on('patient')->onDelete('cascade'); // patient table is not created yet
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slot_booking');
    }
};
