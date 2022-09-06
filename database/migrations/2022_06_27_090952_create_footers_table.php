<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->text('term_of_use')->nullable();
            $table->text('term_of_sale')->nullable();
            $table->text('location')->nullable();
            $table->text('facebook_link')->nullable();
            $table->text('instagram_link')->nullable();
            $table->text('twitter_link')->nullable();
            $table->dateTime('opining_time')->nullable();
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
        Schema::dropIfExists('footers');
    }
}
