<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('lastname', 50);
            $table->integer('age_group_fk')->default(1)->unsigned();
            $table->string('phone', 20);
            $table->string('adress', 200);
            $table->integer('newsletter_fk')->default(1)->unsigned();
            $table->integer('photo_fk')->nullable()->unsigned();
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
        Schema::drop('user_informations');
    }
}
