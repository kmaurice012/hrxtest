<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRprActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpr_actions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('cmp_id');
            $table->integer('id_user');
            $table->unsignedBigInteger('rus_id');
            $table->enum('action_type',['comment', 'verify','reject','rework']);
            $table->text('comment')->nullable();
            $table->text('verify_comment')->nullable();
            $table->text('reject_comment')->nullable();
            $table->text('rework_comment')->nullable();
            $table->timestamps();

            $table->foreign('cmp_id')->references('id')->on('rpr_code_compliances')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('rpr_users')->onDelete('cascade');
            $table->foreign('rus_id')->references('id')->on('rpr_org_users')->onDelete('cascade');
        });

        Schema::table('rpr_actions', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('rpr_actions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rpr_actions');
    }
}
