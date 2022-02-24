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
        Schema::create('rpr_code_compliances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rcd_id');
            $table->unsignedBigInteger('rev_id');
            $table->char('complied', 1)->default('N');
            $table->timestamp('reviewed_date')->nullable();
            $table->timestamp('from_date');
            $table->timestamp('end_date')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();

            $table->foreign('rcd_id')->references('id')->on('rpr_user_codes')->onDelete('cascade');
            $table->foreign('rev_id')->references('id')->on('rpr_events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rpr_code_compliances');
    }
}
