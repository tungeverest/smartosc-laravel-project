<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $guarded = [];
    protected $fillable = [
        'pro_name','pro_slug','pro_price','price_sales','pro_img','is_sales','brand_id','description','xuat_xu','bao_hanh','tinh_trang','trang_thai',
    ];

    public function brand(){
    	return $this->belongsTo('App\Brand','brand_id');
    }

    public function catagorys(){
        return $this->belongsToMany('App\Category','listcate', 'product_id', 'categoty_id');
    }

    public function customersReviews(){
        return $this->belongsToMany('App\Customer','review', 'product_id', 'categoty_id');
    }

    public function listImgs(){
    	return $this->hasMany('App\Listimg','product_id');
    }

    public function listCates(){
    	return $this->hasMany('App\Listcate','product_id');
    }

    public function reviews(){
    	return $this->hasMany('App\Review','product_id');
    }

    public function orderDetails(){
    	return $this->hasMany('App\OrderDetail','product_id');
    }

     public function banners(){
        return $this->hasMany('App\Banner','product_id');
    }
}
