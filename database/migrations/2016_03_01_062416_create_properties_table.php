<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->double('price');
            $table->string('to');
            $table->string('type');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->string('area');
            $table->text('description');
            $table->string('furnish');
            $table->string('emirate');
            $table->string('city');
            $table->string('sublocation');
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
        Schema::drop('properties');
    }
}
