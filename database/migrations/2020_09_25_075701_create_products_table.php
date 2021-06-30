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
            $table->smallIncrements('id');
            $table->string('key')->unique();
            $table->string('name');
            $table->enum('type', ['MACHINE', 'ADDON', 'ACCESSORY', 'PRESET_FILTER', 'MEMBERSHIP', 'RENEWAL_FILTER'])->nullable();
            $table->string('technology')->nullable();
            $table->string('generation')->nullable();
            $table->string('image')->nullable();

            $table->unsignedSmallInteger('promo_id')->nullable();
            $table->unsignedSmallInteger('validity_months')->nullable();
            $table->double('price', 10,2)->nullable();
            $table->double('shipping_price', 10,2)->nullable();
            $table->double('renewal_shipping_price', 10,2)->nullable();
            $table->boolean('is_installable')->default(false);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('promo_id')->references('id')->on('promos');
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
