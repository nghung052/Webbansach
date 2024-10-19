<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_type')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->integer('id_company')->unsigned();
            $table->string('name');
            $table->integer('unit_price');
            $table->integer('promotion_price')->nullable();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->longtext('imagedetail')->nullable();
            $table->string('publisher')->nullable();
            $table->string('format')->nullable();
            $table->integer('new')->nullable();
            $table->integer('status')->nullable();
            $table->string('language')->nullable();
            $table->string('pagenumber')->nullable();
            $table->string('size')->nullable();
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
        Schema::dropIfExists('product');
    }
}
