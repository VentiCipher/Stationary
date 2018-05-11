<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id');
            $table->string('ordercode');
            $table->string('address',100);
            $table->string('invoice',100);
            $table->integer('payments_id')->nullable();
            $table->string('methods',100);
            $table->double('delivery_cost',100)->default(0);
            $table->string('cards',16)->nullable();
            $table->string('coupon',50)->nullable();
            $table->double('total');

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
        Schema::dropIfExists('orders');
    }
}
