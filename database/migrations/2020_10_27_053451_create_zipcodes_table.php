<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZipcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zipcodes', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('zone');
            $table->string('zip');
            $table->string('state');
            $table->string('country');
            $table->string('primary_city')->nullable();
            $table->string('county')->nullable();
            $table->string('area_codes')->nullable();
            $table->double('shipping_price', 10,2)->nullable()->index();
            $table->double('p1_shipping_price', 10,2)->nullable();

            $table->index('zone');
            $table->index('zip');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zipcodes');
    }
}
