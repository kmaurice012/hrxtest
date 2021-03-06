<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpr_organizations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('oty_id');
            $table->string('organization_name');
            $table->string('primary_color')->nullable();
            $table->string('secondary_color1')->nullable();
            $table->string('secondary_color2')->nullable();
            $table->string('secondary_color3')->nullable();
            $table->timestamps();

            $table->foreign('oty_id')->references('id')->on('rpr_org_type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rpr_organizations');
    }
}
