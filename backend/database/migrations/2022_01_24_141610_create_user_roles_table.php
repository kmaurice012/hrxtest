<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpr_user_roles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rus_id');
            $table->unsignedBigInteger('rle_id');
            $table->timestamp('start_date');
            $table->timestamp('end_date')->nullable();
            $table->timestamps();

            $table->foreign('rus_id')->references('id')->on('rpr_org_users')->onDelete('cascade');
            $table->foreign('rle_id')->references('id')->on('rpr_roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rpr_user_roles');
    }
}
