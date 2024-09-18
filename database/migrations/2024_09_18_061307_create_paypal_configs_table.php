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
        Schema::create('paypal_configs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->enum('PAYPAL_MODE',['sandbox','live'])->default('live');
            $table->string('PAYPAL_LIVE_CLIENT_ID');
            $table->string('PAYPAL_LIVE_CLIENT_SECRET');
            $table->string('PAYPAL_LIVE_APP_ID');
            $table->enum('PAYPAL_PAYMENT_ACTION',['Sale','Authorization','Order'])->default('Sale');
            $table->foreign('doctor_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paypal_configs');
    }
};
