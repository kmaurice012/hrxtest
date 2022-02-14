<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBodyVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('body_verifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rct_id');
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('cmp_id');
            $table->string('comments');
            $table->date('action_date');
            $table->timestamps();

            $table->foreign('id_users')->references('id')->on('users');
            $table->foreign('cmp_id')->references('id')->on('code_compliances');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('body_verifications');
    }
}
