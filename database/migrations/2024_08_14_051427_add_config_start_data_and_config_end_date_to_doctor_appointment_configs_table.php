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
        Schema::table('doctor_appointment_configs', function (Blueprint $table) {
            $table->date('config_start_date')->nullable();
            $table->date('config_end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctor_appointment_configs', function (Blueprint $table) {
            $table->dropColumn('config_start_date');
            $table->dropColumn('config_end_date');
        });
    }
};
