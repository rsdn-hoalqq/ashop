<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('pid');
            $table->string('name');
            $table->integer('id_type');
            $table->integer('producer_id');
            $table->text('description');
            $table->text('detail');
            $table->float('unit_price');
            $table->float('promotion_price');
            $table->string('image');
            $table->integer('soluong');
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
        Schema::dropIfExists('products');
    }
}
