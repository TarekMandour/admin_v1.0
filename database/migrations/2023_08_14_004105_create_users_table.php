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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('password');
            $table->string('email')->nullable();
            $table->biginteger('tax_num')->nullable();
            $table->biginteger('national_id')->nullable();
            $table->text('address')->nullable();
            $table->date('id_num_expired')->nullable();
            $table->string('id_num_export')->nullable();
            $table->string('nationality')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->unsignedBigInteger('neighborhood_id');
            $table->foreign('neighborhood_id')->references('id')->on('neighborhoods')->onDelete('cascade');
            $table->enum('type', ['user', 'provider'])->default('user'); 
            $table->enum('is_active', [0, 1, 2])->default(1)->comment("0 => not active, 1 => active, 2 => suspended");
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
