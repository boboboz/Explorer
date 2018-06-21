<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePmhaveMovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pmhave_moves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('p_id');
            $table->foreign('p_id')->references('no_id')->on('pokemon');
            $table->integer('m_id');
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
        $table->dropForeign('posts_p_id_foreign');
        Schema::dropIfExists('pmhave_moves');
    }
}
