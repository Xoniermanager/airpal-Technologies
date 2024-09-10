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
        Schema::create('page_extra_sections', function (Blueprint $table) {
            $table->id();
            $table->integer('page_id');
            $table->string('model');
            $table->enum('order_by',['asc','desc']);
            $table->string('order_with_column')->nullable();
            $table->string('no_of_records')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_extra_sections');
    }
};
