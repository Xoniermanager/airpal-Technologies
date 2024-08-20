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
        Schema::create('patient_diary_additional_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_diary_id');
            $table->foreign('patient_diary_id')->references('id')->on('patient_diaries');
            $table->string('type');
            $table->tinyText('additional_note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_diary_additional_infos');
    }
};
