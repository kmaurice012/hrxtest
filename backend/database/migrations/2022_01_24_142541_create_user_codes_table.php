<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_codes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usr_id');
            $table->unsignedBigInteger('cds_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();

            $table->foreign('cds_id')->references('id')->on('codes');
            $table->foreign('usr_id')->references('id')->on('org_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_codes');
    }
}
