<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeEvolation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evolutions', function (Blueprint $table) {
            $table->dropColumn(['no_id', 'name', 'en_name', 'end']);
            $table->integer('before_id');
            $table->integer('after_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evolutions', function (Blueprint $table) {
            $table->integer('no_id');
            $table->string('name', 200);
            $table->string('en_name', 200);
            $table->string('end', 200)->nullable();
            $table->dropColumn(['before_id', 'after_id']);
        });
    }
}
