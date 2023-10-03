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
            $table->string('name_ar');
            $table->text('description_ar');
            $table->text('vision_ar')->nullable();
            $table->text('mission_ar')->nullable();
            $table->text('massage_ar')->nullable();
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
