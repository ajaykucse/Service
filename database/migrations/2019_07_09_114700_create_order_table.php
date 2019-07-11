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
            $table->bigIncrements('id');
            $table->string('product_code','20');
            $table->string('product_desc');
            $table->string('price');
            $table->string('quantity');
            $table->string('cust_code','20');
            $table->string('cust_stock');
            $table->foreign('product_code')->references('Code')->on('tblProduct')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('orders');
    }
}
