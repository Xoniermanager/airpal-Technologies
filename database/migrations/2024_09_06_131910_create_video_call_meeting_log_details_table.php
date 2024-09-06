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
        Schema::create('video_call_meeting_log_details', function (Blueprint $table) {
            $table->id();
            $table->string('meeting_id');
            $table->string('person1_name');
            $table->time('person1_join_time');
            $table->string('person2_name');
            $table->time('person2_join_time');
            $table->time('call_end_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_call_meeting_log_details');
    }
};
