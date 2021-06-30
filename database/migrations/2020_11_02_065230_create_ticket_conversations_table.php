<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_conversations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('ticket_id')->constrained();

            $table->enum('actor', ['USER', 'IBO', 'ADMIN'])->nullable();
            $table->foreignId('actor_id')->nullable()->constrained('users');

            $table->text('message')->nullable();
            $table->boolean('is_first_message')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_conversations');
    }
}
