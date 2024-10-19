<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillInDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_in_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_bill_in')->unsigned();
            $table->integer('id_product')->unsigned();
            $table->integer('quantity');
            $table->integer('original_price');
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
        Schema::dropIfExists('bill_in_detail');
    }
}
