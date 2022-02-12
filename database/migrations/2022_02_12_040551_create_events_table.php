<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'events',
            function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('recurrence_id');
                $table->string('title');
                $table->date('start_date');
                $table->date('end_date');
                // $table->foreign('recurrence_id')
                //     ->references('id')
                //     ->on('recurrences')
                //     ->onDelete('cascade')
                //     ->onUpdate('cascade');;
                $table->softDeletes($column = 'deleted_at', $precision = 0);
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
        Schema::dropIfExists('events');
    }
}
