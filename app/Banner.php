<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner';
    protected $guarded = [];
    public $timestamps = false;

    public function product(){
    	return $this->belongsTo('App\Product','product_id');
    }
}