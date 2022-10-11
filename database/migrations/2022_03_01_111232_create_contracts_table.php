<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//
            $table->integer('section_id')->unsigned()->nullable();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');

            $table->integer('project_id')->unsigned()->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

            $table->enum('construction_type', array('1', '2'))->nullable();
            $table->string('code');
            $table->integer('id_card_number')->nullable();
            $table->date('id_card_date')->nullable();
            $table->string('status_card_issuer', 250)->nullable();
            $table->string('status_card_image', 500)->nullable();
            $table->integer('Instrument_no')->nullable();
            $table->string('Instrument_image', 500)->nullable();
            $table->date('Instrument_date')->nullable();
            $table->integer('building_permit_number')->nullable();
            $table->date('license_date')->nullable();
            $table->string('license_image', 500)->nullable();
            $table->string('engineering_office_name', 250)->nullable();
            $table->string('engineer_name', 250)->nullable();
            $table->string('engineer_phone_email', 250)->nullable();
            $table->string('starch_chart_image', 500)->nullable();
            $table->string('website_image', 500)->nullable();

            $table->string('contract_file', 500)->nullable();
            $table->string('final_contract', 500)->nullable();

            $table->integer('price')->nullable();
            $table->string('price_details', 500)->nullable();
            $table->string('reason_review', 500)->nullable();

            $table->string('suggested_projects', 500)->nullable();
            $table->string('projects_details', 500)->nullable();

            $table->enum('status', array(0,1,2,3,4,5,6))->nullable();
            $table->enum('approval', array(0,1))->nullable();
            $table->enum('viewing_status', array(0, 1))->nullable();
            $table->enum('Clearance_viewing_status', array(0, 1))->nullable();
            $table->enum('clearance_status_admin', array(0, 1))->nullable();


            $table->integer('duration_project')->nullable();
            $table->integer('Work_guarantee_period')->nullable();

            $table->integer('price1')->nullable();
            $table->integer('price2')->nullable();
            $table->integer('price3')->nullable();
            $table->integer('price4')->nullable();
            $table->integer('price5')->nullable();

            $table->integer('paying1')->nullable();
            $table->integer('paying2')->nullable();
            $table->integer('paying3')->nullable();
            $table->integer('paying4')->nullable();
            $table->integer('paying5')->nullable();
            $table->integer('paying6')->nullable();
            $table->integer('paying7')->nullable();

            $table->string('payment_content1')->nullable();
            $table->string('payment_content2')->nullable();
            $table->string('payment_content3')->nullable();
            $table->string('payment_content4')->nullable();
            $table->string('payment_content5')->nullable();
            $table->string('payment_content6')->nullable();
            $table->string('payment_content7')->nullable();




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
        Schema::dropIfExists('contracts');
    }
}
