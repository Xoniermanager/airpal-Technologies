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
        Schema::create('doctor_patient_chat_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_patient_chats_id');
            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('receiver_id');
            $table->foreign('sender_id')->references('id')->on('users');
            $table->foreign('receiver_id')->references('id')->on('users');
            $table->string('body');
            $table->boolean('read')->default(0);
            $table->boolean('is_file')->default('0');
            $table->date('message_sent_date');
            $table->timestamps();
        });

        Schema::table('doctor_patient_chats', function(Blueprint $table){
            $table->unsignedBigInteger('last_message_id')->nullable();
            $table->foreign('last_message_id')->references('id')->on('doctor_patient_chat_histories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_patient_chat_histories');
    }
};
