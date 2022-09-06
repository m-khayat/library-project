<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->dateTime('birth_date')->nullable();
            $table->dateTime('death_date')->nullable();
            $table->text('resum')->nullable();
            $table->text('image')->nullable();
            $table->text('facebook_link')->nullable();
            $table->text('instagram_link')->nullable();
            $table->text('twitter_link')->nullable();
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
        Schema::dropIfExists('authors');
    }
}
