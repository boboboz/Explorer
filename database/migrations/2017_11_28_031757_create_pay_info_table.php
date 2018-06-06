<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->double('invoice_payable', 6);
            $table->double('invoice_real_self', 6);
            $table->double('invoice_real_instead', 6);
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
        Schema::dropIfExists('pay_info');
    }
}
