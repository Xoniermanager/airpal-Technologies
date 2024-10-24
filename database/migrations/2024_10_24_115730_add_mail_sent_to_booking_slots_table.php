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
        Schema::table('booking_slots', function (Blueprint $table) {
            $table->boolean('mail_sent')->default(false)->after('meeting_id'); // replace 'column_name' with the correct column after which you want to add 'mail_sent'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('booking_slots', function (Blueprint $table) {
            $table->dropColumn('mail_sent');
        });
    }
};
