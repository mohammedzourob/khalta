<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBondTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bond', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contract_number')->nullable();
            $table->string('supervisor_name', 250)->nullable();
            $table->integer('exchange_amount');
            $table->string('exchange_reason', 500)->nullable();
            $table->date('date_of_application')->nullable();
            $table->enum('viewing_status', array('0', '1'));
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('bond');
    }
}
