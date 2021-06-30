<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionDefaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commission_defaults', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedSmallInteger('product_id');
            $table->enum('role', ['AGENT', 'AFFILIATE'])->index();
            $table->string('key');
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('amount', 10, 2);

            $table->softDeletes();

            $table->foreign('product_id')->references('id')->on('products');
            $table->index(['product_id', 'key']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commission_defaults');
    }
}
