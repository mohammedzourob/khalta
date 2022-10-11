<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConnectUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connect_us', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('phone');
            $table->string('email', 250)->nullable();
            $table->string('content', 500)->nullable();
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
        Schema::dropIfExists('connect_us');
    }
}
