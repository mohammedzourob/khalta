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

            $table->increments('id');

            $table->integer('sender_id')->unsigned();
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('receiver_id')->unsigned();
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('contract_id')->nullable()->unsigned();
            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');

            $table->integer('work_id')->nullable()->unsigned();
            $table->foreign('work_id')->references('id')->on('work')->onDelete('cascade');

            $table->string('message')->nullable();
            $table->enum('message_type', array('0', '1'));
            $table->enum('status', array('0', '1'));
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
