<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class placeOrder extends Model
{
    protected $table = 'place_orders';

    public function placeOrders(){

    	return $this->hasMany('App\placeOrderProduct','placeOrder_id');
    }
}
