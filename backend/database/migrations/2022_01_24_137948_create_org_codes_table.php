<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrgCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpr_org_codes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cds_id');
            $table->unsignedBigInteger('ror_id');
            $table->timestamp('due_date');
            $table->timestamp('start_date');
            $table->timestamp('end_date')->nullable();
            $table->timestamps();

            $table->foreign('cds_id')->references('id')->on('codes')->onDelete('cascade');
            $table->foreign('ror_id')->references('id')->on('organizations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('org_codes');
    }
}
