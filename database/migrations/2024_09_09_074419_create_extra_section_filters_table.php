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
        Schema::create('extra_section_filters', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('value');
            $table->unsignedBigInteger('page_extra_sections_id');
            $table->foreign('page_extra_sections_id')->references('id')->on('page_extra_sections');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extra_section_filters');
    }
};
