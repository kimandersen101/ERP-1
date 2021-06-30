<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerts', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('message');
            $table->text('message_html');
            $table->string('url')->nullable();

            $table->boolean('is_sent')->default(false)->index();
            $table->boolean('is_agent')->default(false)->index();
            $table->boolean('is_customer')->default(false)->index();

            $table->timestamp('scheduled_at')->nullable()->index();

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
        Schema::dropIfExists('alerts');
    }
}
