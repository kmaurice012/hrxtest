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
        Schema::create('rpr_user_codes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rus_id');
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->timestamps();

            
            $table->foreign('rus_id')->references('id')->on('rpr_org_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rpr_user_codes');
    }
}
