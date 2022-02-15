<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpr_periods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('roc_id');
            $table->string('period_name');
            $table->timestamp('period_start_date')->nullable();
            $table->timestamp('period_end_date')->nullable();
            $table->timestamps();


            $table->foreign('roc_id')->references('id')->on('rpr_org_codes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rpr_periods');
    }
}
