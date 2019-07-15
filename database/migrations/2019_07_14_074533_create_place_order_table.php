<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cust_code','20');
            $table->string('name','50');
            $table->string('email','50');
            $table->string('address','50');
            $table->string('city','50');
            $table->string('region','50');
            $table->string('country','50');
            $table->string('fax','50');
            $table->string('mobile','50');
            $table->tinyInteger('order_status');
            $table->string('payment_method','50');
            $table->float('total_amount', 8,2);
            $table->foreign('cust_code')->references('Code')->on('tblCustomer')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('place_orders');
    }
}
