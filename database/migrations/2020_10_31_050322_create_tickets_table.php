<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('ticket_category_id')->nullable();

            $table->enum('actor', ['USER', 'IBO', 'ADMIN'])->nullable();
            $table->foreignId('actor_id')->nullable()->constrained('users');
            $table->foreignId('submitted_for')->nullable()->constrained('users');

            $table->string('title')->nullable();
            $table->enum('status', ['OPENED', 'RESOLVED'])->default('OPENED')->index();

            $table->enum('resolved_by', ['USER', 'IBO', 'ADMIN'])->nullable();
            $table->foreignId('resolved_by_id')->nullable()->constrained('users');

            $table->timestamp('resolved_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('ticket_category_id')->references('id')->on('ticket_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
