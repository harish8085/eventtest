<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventRecurrencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'event_recurrences',
            function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('event_id');
                // $table->foreign('event_id')
                //     ->references('id')
                //     ->on('events')
                //     ->onDelete('cascade')
                //     ->onUpdate('cascade');;
                $table->unsignedBigInteger('recurrence_id');
                // $table->foreign('recurrence_id')
                //     ->references('id')
                //     ->on('recurrences')
                //     ->onDelete('cascade')
                //     ->onUpdate('cascade');;
                $table->string('repeat_on')->nullable();
                $table->string('skip_day')->nullable();
                $table->string('repeat_index')->nullable();
                $table->string('repeat_day')->nullable();
                $table->string('repeat_criteria')->nullable();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_recurrences');
    }
}
