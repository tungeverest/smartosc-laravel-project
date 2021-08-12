<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
	protected $table = 'brand';
	protected $guarded = [];
	public $timestamps = false;

	public function products(){
		return $this->hasMany('App\Product','brand_id');
	}

	public static function BrandSearch($keyword, $paginate){
		return Brand::where('name', 'like', '%' . $keyword . '%')->paginate($paginate, ['*'], 'pp');
	}
}
