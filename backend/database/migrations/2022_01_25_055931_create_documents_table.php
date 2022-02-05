<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cmp_id');
            $table->string('doc_name');
            $table->unsignedBigInteger('archive');
            $table->string('file_type');
            $table->binary('content');
            $table->string('file_size');
            $table->timestamps();

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
        Schema::dropIfExists('documents');
    }
}
