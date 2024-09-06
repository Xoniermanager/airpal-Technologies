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
        Schema::create('appointment_config_exception_days', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_appointment_config_id')->constrained();
            $table->integer('exception_days_id');
            $table->foreign('doctor_appointment_config_id','doctor_appointment_configs_foreign_exception')
                ->references('id')
                ->on('doctor_appointment_configs')
                ->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exception_days');
    }
};
