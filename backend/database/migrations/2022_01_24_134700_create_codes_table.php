<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpr_codes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fr_id');
            $table->string('code');
            $table->string('serial_number');
            $table->string('description');
            $table->string('color_code')->nullable();
            $table->timestamp('due_date')->nullable();
            $table->integer('hours_offset')->nullable();
            $table->integer('days_offset')->nullable();
            $table->integer('weeks_offset')->nullable();
            $table->integer('months_offset')->nullable();
            $table->integer('years_offset')->nullable();
            $table->timestamps();

            $table->foreign('fr_id')->references('id')->on('rpr_codes_frequency')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rpr_codes');
    }
}
