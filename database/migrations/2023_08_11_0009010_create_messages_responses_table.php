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
        Schema::create('messages_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('message_id')->nullable();
            $table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade');
            $table->text('response')->nullable();
            $table->enum('status',['read','unread'])->default('unread');
            $table->enum('sender_type',['user','supervisor']);
            $table->unsignedInteger('sender_id');
            $table->enum('receiver_type',['user','supervisor']);
            $table->unsignedInteger('receiver_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages_responses');
    }
};
