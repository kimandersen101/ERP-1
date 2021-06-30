<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTouchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('touches', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedSmallInteger('touch_category_id')->nullable();
            $table->unsignedSmallInteger('script_id');
            $table->unsignedSmallInteger('interest_id')->nullable();

            $table->unsignedSmallInteger('attempt')->nullable();
            $table->enum('type',[ 'AFFILIATE', 'ARTICLE', 'BOOKLET', 'PURCHASE', 'TEXT', 'VIDEO'])->default('TEXT');
            $table->smallInteger('type_id')->nullable();
            $table->string('title')->nullable();
            $table->smallInteger('order')->nullable();
            $table->string('ki_states_rule')->nullable();
            $table->timestamps();
            $table->softDeletes();

            //foreign keys
            $table->foreign('touch_category_id')->references('id')->on('touch_categories');
            $table->foreign('script_id')->references('id')->on('scripts');
            $table->foreign('interest_id')->references('id')->on('interests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('touches');
    }
}
