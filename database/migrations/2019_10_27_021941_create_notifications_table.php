<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('ref_type')->nullable();
            $table->unsignedBigInteger('ref_id')->nullable();
            $table->tinyInteger('destination_type')->nullable();
            $table->unsignedBigInteger('destination_id')->nullable();
            $table->string('title')->nullable();
            $table->string('title_ar')->nullable();
            $table->string('message')->nullable();
            $table->string('message_ar')->nullable();
            $table->tinyInteger('type')->default(0);
            $table->timestamp('read_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
