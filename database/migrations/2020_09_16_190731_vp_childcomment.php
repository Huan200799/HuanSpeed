<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VpChildcomment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('childcomment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('childcom_email');
            $table->string('childcom_name');
            $table->string('childcom_content');
            $table->integer('childcom_comment')->unsigned();
            $table->foreign('childcom_comment')
            ->references('id')->on('comment')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('childcomment');
    }
}
