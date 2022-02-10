<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodeCompliancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code_compliances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rcd_id');
            $table->unsignedBigInteger('rev_id');
            $table->timestamp('reviewed_date');
            $table->timestamp('from_date');
            $table->timestamp('end_date');
            $table->timestamps();

            $table->foreign('rcd_id')->references('id')->on('user_codes')->onDelete('cascade');
            $table->foreign('rev_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('code_compliances');
    }
}
