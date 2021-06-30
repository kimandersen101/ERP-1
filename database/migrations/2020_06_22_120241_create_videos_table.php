<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->smallIncrements('id');

            $table->string('slug')->index();
            $table->string('title')->nullable();
            $table->string('wistia_hash');
            $table->unsignedSmallInteger('funnel_order')->nullable();

            $table->boolean('is_educational')->default(false);
            $table->boolean('is_testimonial')->default(false);
            $table->boolean('is_business')->default(false);

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
        Schema::dropIfExists('videos');
    }
}
