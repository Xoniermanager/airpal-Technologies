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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id');
            $table->string('paypal_payment_id')->nullable();
            $table->string('amount');
            $table->string('currency');
            $table->string('payer_name')->nullable();
            $table->string('payer_email')->nullable();
            $table->string('payment_status');
            $table->string('payment_method')->nullable();
            $table->string('purpose')->nullable();
            $table->text('payment_details')->nullable();
            $table->timestamps();
            $table->foreign('booking_id')->references('id')->on('booking_slots');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
