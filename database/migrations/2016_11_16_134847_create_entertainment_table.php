<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntertainmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entertainment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fk_reservation')->nullable()->unsigned();
            $table->integer('activity_fk')->default(1)->unsigned();
            $table->integer('theme_fk')->default(3)->unsigned();
            $table->double('price', 20);
            $table->time('duration', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('entertainment');
    }
}
