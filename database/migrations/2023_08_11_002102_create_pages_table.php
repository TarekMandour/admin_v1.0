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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->text('massage')->nullable();
            $table->string('name_en')->nullable();
            $table->text('description_en')->nullable();
            $table->text('vision_en')->nullable();
            $table->text('mission_en')->nullable();
            $table->text('massage_en')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
