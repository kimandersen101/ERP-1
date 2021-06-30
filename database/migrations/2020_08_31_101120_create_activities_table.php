<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('activities');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('actor_id')->constrained('users');
            $table->foreignId('agent_id')->nullable()->constrained('users');

            $table->string('key')->index();
            $table->string('value')->nullable()->index();
            $table->string('location');
            $table->text('context')->nullable();
            $table->string('object')->nullable();
            $table->unsignedSmallInteger('object_id')->nullable()->index();

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
        Schema::dropIfExists('activities');
    }
}
