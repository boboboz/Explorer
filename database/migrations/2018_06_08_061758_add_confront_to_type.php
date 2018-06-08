<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConfrontToType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pokemon_types', function (Blueprint $table) {
            $table->double('water', 8, 1)->default(1);
            $table->double('fire', 8, 1)->default(1);
            $table->double('grass', 8, 1)->default(1);
            $table->double('flying', 8, 1)->default(1);
            $table->double('ice', 8, 1)->default(1);
            $table->double('normal', 8, 1)->default(1);
            $table->double('bug', 8, 1)->default(1);
            $table->double('fight', 8, 1)->default(1);
            $table->double('ghost', 8, 1)->default(1);
            $table->double('dark', 8, 1)->default(1);
            $table->double('dragon', 8, 1)->default(1);
            $table->double('electr', 8, 1)->default(1);
            $table->double('poison', 8, 1)->default(1);
            $table->double('psychic', 8, 1)->default(1);
            $table->double('rock', 8, 1)->default(1);
            $table->double('steel', 8, 1)->default(1);
            $table->double('ground', 8, 1)->default(1);
            $table->double('fairy', 8, 1)->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pokemon_types', function (Blueprint $table) {
            $table->dropColumn(['water', 'fire', 'grass', 'flying', 'ice', 'normal', 'bug', 'fight', 'ghost', 'dark', 'dragon', 'electr', 'poison', 'psychic', 'rock', 'steel', 'ground', 'fairy']);
        });
    }
}
