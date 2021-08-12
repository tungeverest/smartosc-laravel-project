<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'category';
	protected $guarded = [];
	public $timestamps = false;


	public function listCates(){
		return $this->hasMany('App\Listcate','category_id');
	}

	public function products(){
		return $this->belongsToMany('App\Product', 'listcate', 'category_id', 'product_id');
	}
}
