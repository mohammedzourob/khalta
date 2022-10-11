<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_image', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('work_id')->unsigned();
            $table->foreign('work_id')->references('id')->on('work')->onDelete('cascade');
            $table->string('image', 500)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_image');
    }
}
