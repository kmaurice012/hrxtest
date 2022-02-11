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
        Schema::create('rpr_events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cds_id');
            $table->string('event');
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->string('url')->nullable();
            $table->string('location')->nullable();
            $table->string('color')->nullable();
            $table->timestamps();

            $table->foreign('cds_id')->references('id')->on('codes')->onDelete('cascade');
        });
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
