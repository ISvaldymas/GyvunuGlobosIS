<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmenityRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('amenity_room', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('room_id')->unsigned();
           $table->integer('amenity_id')->nullable()->unsigned();
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
        Schema::dropForeign(['room_id']);
        Schema::dropForeign(['amenity_id']);
        Schema::drop('rated_rooms');
    }
}
