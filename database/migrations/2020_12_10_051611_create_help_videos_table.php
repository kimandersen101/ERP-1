<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelpVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('help_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('video_id')->nullable();

            $table->text('page')->nullable();
            $table->text('label')->nullable();
            $table->text('title')->nullable();
            $table->text('description')->nullable();

            $table->boolean('is_agent')->default(false);
            $table->boolean('is_customer')->default(false);

            $table->softDeletes();

            $table->foreign('video_id')->references('id')->on('videos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('help_videos');
    }
}
