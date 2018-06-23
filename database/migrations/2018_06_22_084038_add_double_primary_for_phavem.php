<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDoublePrimaryForPhavem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pmhave_moves', function (Blueprint $table) {
            $table->unique(['p_id', 'm_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pmhave_moves', function (Blueprint $table) {;
            $table->dropForeign(['p_id']);
            $table->dropUnique(['p_id', 'm_id']);
        });
    }
}
