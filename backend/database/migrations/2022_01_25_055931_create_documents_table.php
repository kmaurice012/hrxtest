<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->bigInteger('file_size'); 
            $table->timestamps();

            $table->foreign('cmp_id')->references('id')->on('code_compliances')->onDelete('cascade');
        });

        //set content to medium blob
        DB::statement('ALTER TABLE documents MODIFY COLUMN content MEDIUMBLOB');
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
