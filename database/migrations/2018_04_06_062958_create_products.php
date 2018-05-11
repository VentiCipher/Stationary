<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name');
            $table->integer('in_stock');
//            $table->integer('categories_id')->nullable();
            $table->string('description')->nullable();
            $table->double('price');
            $table->double('price_promo')->nullable();
            $table->string('color')->nullable();
            $table->string('createby');
            $table->integer('promotion_id')->nullable();
            $table->string('thumbsnail')->nullable();
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
        Schema::dropIfExists('products');
    }
}
