<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('no_id');
            $table->string('name', 100);
            $table->string('name_en', 100);
            $table->integer('type1')->unsigned();
            // $table->foreign('type1')->references('id')->on('pokemon_types');
            $table->integer('type2')->unsigned();
            // $table->foreign('type2')->references('id')->on('pokemon_types');
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
        Schema::dropIfExists('pokemon');
    }
}
