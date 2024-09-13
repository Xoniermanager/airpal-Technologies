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
        Schema::table('section_lists', function (Blueprint $table) {
            $table->integer("section_id")->after('icon');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('section_lists', function (Blueprint $table) {
            $table->dropColumn('section_id');
        });
    }
    
};
