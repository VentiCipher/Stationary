<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImgs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('product_imgs', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('product_id');
            $table->string('category_id');
            $table->string('path');
            $table->string('createby');
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
        //
        Schema::dropIfExists('product_imgs');
    }
}
