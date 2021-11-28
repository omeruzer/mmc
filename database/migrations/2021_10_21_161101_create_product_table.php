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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('img');
            $table->string('country');
            $table->string('colors');
            $table->string('material');
            $table->string('pattern');
            $table->string('packQty');
            $table->string('size');
            $table->integer('code');
            $table->bigInteger('category')->unsigned();
            $table->bigInteger('brand')->unsigned();
            $table->bigInteger('hit')->default(0);
            $table->longText('keyw');
            $table->longText('desc');
            $table->longText('content');
            $table->decimal('price',20,2);
            $table->integer('quantity');

            $table->timestamps();

            $table->foreign('category')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand')->references('id')->on('brands')->onDelete('cascade');
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
