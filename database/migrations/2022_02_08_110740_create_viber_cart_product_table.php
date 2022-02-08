<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViberCartProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viber_cart_product', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cart_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->timestamps();

            $table->foreign('cart_id')->references('id')->on('viber_cart')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viber_cart_product');
    }
}
