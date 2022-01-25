<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cds_id');
            $table->unsignedBigInteger('parent_id');
            $table->text('details');
            $table->timestamps();

            $table->foreign('cds_id')->references('id')->on('codes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('code_details');
    }
}
