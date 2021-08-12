<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listcate extends Model
{
    protected $table = 'listcate';
    protected $guarded = [];
    	public $timestamps = false;
    
    public function product(){
    	return $this->belongsTo('App\Product','product_id');
    }

    public function category(){
    	return $this->belongsTo('App\Category','category_id');
    }
}
