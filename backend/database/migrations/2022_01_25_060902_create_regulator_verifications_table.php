<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulatorVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpr_regulator_verifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rct_id');
            $table->integer('id_users');
            $table->unsignedBigInteger('cmp_id')->unique();
            $table->string('comments');
            $table->timestamp('action_date');
            $table->timestamps();

            $table->foreign('id_users')->references('id')->on('rpr_users')->onDelete('cascade');
            $table->foreign('cmp_id')->references('id')->on('rpr_code_compliances')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rpr_regulator_verifications');
    }
}
