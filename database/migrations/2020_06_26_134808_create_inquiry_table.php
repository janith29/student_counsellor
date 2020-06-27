<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiry', function (Blueprint $table) {
            $table->increments('id');
            $table->string('std_name');
            $table->string('email');
            $table->string('address');
            $table->integer('age');
            $table->string('phone_num');
            $table->string('course');
            $table->string('university');
            $table->date('start_date');
            $table->boolean('submit_document');
            $table->boolean('submit_offer');
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
        Schema::dropIfExists('inquiry');
    }
}
