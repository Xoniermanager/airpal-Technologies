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
            $table->string('appointment_fee')->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctor_appointment_configs', function (Blueprint $table) {
            $table->dropColumn('appointment_fee');
        });
    }
};