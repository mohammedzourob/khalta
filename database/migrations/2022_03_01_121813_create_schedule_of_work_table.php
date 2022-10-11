<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleOfWorkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_of_work', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('contract_id')->unsigned();
            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');

            $table->string('name', 250)->nullable();
            $table->date('date')->nullable();
            $table->string('email')->nullable();
            $table->string('publisher')->nullable();
            $table->enum('status', array('0', '1'));
            $table->enum('viewing_status', array('0', '1'));
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
        Schema::dropIfExists('schedule_of_work');
    }
}
