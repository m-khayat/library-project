<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name')->nullable();
            $table->integer('price')->nullable();
            $table->integer('count_view')->nullable();
            $table->float('rate')->nullable();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->boolean('is_offer')->nullable();
            $table->integer('offer_discount')->nullable();

            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->bigInteger('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
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
