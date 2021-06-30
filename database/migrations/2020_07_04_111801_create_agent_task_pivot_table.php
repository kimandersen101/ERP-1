<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentTaskPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_task', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained('agents', 'user_id');
            $table->unsignedSmallInteger('task_id');
            $table->foreignId('lead_id')->constrained('leads', 'user_id');

            $table->boolean('is_notified')->default(false)->index();
            $table->text('notes')->nullable();

            $table->timestamp('started_at', 0)->nullable()->index();
            $table->timestamp('completed_at', 0)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('task_id')->references('id')->on('tasks');

            $table->unsignedBigInteger('live_user_task_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_task');
    }
}
