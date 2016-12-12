<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->text('comment');
            $table->integer('value_id')->nullable()->unsigned();
            $table->boolean('approved');
            $table->integer('room_id')->unsigned();
             $table->integer('photo_fk')->nullable()->unsigned();
            $table->timestamps();
        });
     Schema::table('rates', function ($table){
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign(['room_id']);
        Schema::dropForeign(['value_id']);
        Schema::drop('rates');
    }
}
