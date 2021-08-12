<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listimg extends Model
{
	protected $table = 'listimg';
	protected $guarded = [];
	public $timestamps = false;

	public function product(){
		return $this->belongsTo('App\Product','product_id');
	}
}
