<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCodesCompliancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_codes_compliances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rcd_id');
            $table->unsignedBigInteger('rev_id');
            $table->string('rev_id');
            $table->date('reviewed_date');
            $table->date('from_date');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_codes_compliances');
    }
}
