<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promos', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('key')->unique();
            $table->string('name');
            $table->enum('type', ['PRICE', 'SHIPPING', 'PRODUCT']);
            $table->enum('discount_unit', ['PERCENTAGE', 'AMOUNT']);
            $table->unsignedDecimal('discount_value', 10, 2);
            $table->date('expired_at')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promos');
    }
}
