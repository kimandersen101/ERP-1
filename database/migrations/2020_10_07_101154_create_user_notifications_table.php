<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_notifications', function (Blueprint $table) {
            $table->id();

            $table->foreignId('receiver_id')->constrained('users', 'id');
            $table->foreignId('subject_id')->nullable()->constrained('users', 'id');
            $table->foreignId('alert_id')->nullable()->constrained();
            $table->unsignedSmallInteger('notification_id')->nullable();

            $table->string('title');
            $table->text('message');
            $table->enum('source', ['ADMIN', 'APP', 'LANDING', 'CRON']);
            $table->enum('device_platform', ['ANDROID', 'IOS'])->nullable();
            $table->string('device_os', 10)->nullable();
            $table->string('device_token')->nullable();

            $table->timestamp('read_at', 0)->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('notification_id')->references('id')->on('notifications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_notifications');
    }
}
