<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placeOrder_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cust_code','20');
            $table->string('product_code','20');
            $table->bigInteger('placeOrder_id');
            $table->string('product_desc');
            $table->string('product_price');
            $table->string('quantity');
            $table->foreign('product_code')->references('Code')->on('tblProduct')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cust_code')->references('Code')->on('tblCustomer')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('placeOrder_id')->references('id')->on('place_orders');
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
        Schema::dropIfExists('placeOrder_products');
    }
}
