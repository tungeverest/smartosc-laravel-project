<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{

    protected $table = 'orderdetail';
    protected $guarded = [];

    public function orders(){
        return $this->belongsTo('App\Order','order_id');
    }

    public function product(){
    	return $this->belongsTo('App\Product','product_id');
    }
}
