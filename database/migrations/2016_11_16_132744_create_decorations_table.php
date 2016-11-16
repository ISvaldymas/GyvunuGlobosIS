<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDecorationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decorations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fk_reservation')->nullable()->unsigned();
            $table->integer('design_fk')->default(1)->unsigned();
            $table->integer('color_fk')->default(3)->unsigned();
            $table->integer('music_fk')->default(1)->unsigned();
            $table->integer('theme_fk')->default(3)->unsigned();
            $table->double('price', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('decorations');
    }
}
