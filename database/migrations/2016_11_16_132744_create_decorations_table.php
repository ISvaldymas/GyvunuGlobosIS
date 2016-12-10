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
        Schema::create('decoration', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('design_fk')->default(1)->unsigned();
            $table->integer('color_fk')->default(3)->unsigned();
            $table->integer('music_fk')->default(1)->unsigned();
            $table->integer('theme_fk')->default(3)->unsigned();
            $table->text('body');
            $table->double('price', 20);
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
        Schema::drop('decoration');
    }
}
