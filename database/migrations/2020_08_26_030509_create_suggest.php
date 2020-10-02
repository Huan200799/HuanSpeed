<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuggest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suggest', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->string('product_img');
            $table->text('description');
            $table->integer('price');
            $table->string('condition');
            $table->string('warranty');
            $table->string('accessories');
            $table->string('promotion');
            $table->enum('status',['Stocking', 'Out Of Stock'])->default('Stocking');
            $table->enum('featured',['Prominent', 'Not Prominent'])->default('Not Prominent');
            $table->enum('accept',['Accept', 'Not Accept'])->default('Not Accept');
            $table->enum('classify',['Sport', 'Naked', 'Cruiser'])->default('Sport');
            $table->text('reason');

            $table->integer('categories_id')->unsigned();
            $table->foreign('categories_id')->references(
                'id')->on('categories')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references(
                'id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('suggest');
    }
}
