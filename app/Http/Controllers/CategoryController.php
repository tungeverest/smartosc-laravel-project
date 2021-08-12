<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Listcate;
use App\Category;


class CategoryController extends Controller
{
    public function getList($id,Request $request)
    {

	   	function getid($cate,$category)
		{
		    $list[] = $cate->id;
		    foreach ($category as $key => $value) {
		        if ($value->parent_id == $cate->id) {
		            $list[] = getid($value,$category);
		        }
		    }
		    return $list;
		}
		//lay danh sach barnd
		$list_brand = DB::select('SELECT * from brand');
		//lay file config
		$config = File::get('category.config');
		//lay category name
		// $cate_name = Category::find($id)->name;
		$cate_name = collect(DB::select('SELECT name from category where id = ?',[$id]))->first();
		//lay list category + category
	   	$list_category = DB::select('SELECT category.id,category.name,category.parent_id,category.level as total FROM category');
	   	$cate_info = DB::select('SELECT * From category where id = ?',[$id]);
	   	//lay tat ca id cua cate cha va con 
	    $list = collect(getid($cate_info[0],$list_category))->flatten();
	    // lay danh sach san pham 
	    $product_list = Listcate::select('product_id')->whereIn('category_id',$list)->distinct()->get();
	    $list_id = array();
	    foreach ($product_list as $key => $value) {
	    	$list_id[] = $value->product_id;
	    }
	    //xu ly sort
	    if ($request->has('f') && $request->has('so')) {
	      $fill=$request->f;
	      $sort=$request->so;
	    }
	    else{
	      $fill = 'id';
	      $sort = 'DESC';
	    }
	    //xu ly fill
	    if ($request->has('brand') && $request->has('range')) {
	      if ($request->brand == 'All') {
	      	$brand_id = 0;
	      	$operator = '>';
	      }
	      else{
	      	$brand_id=$request->brand;
	      	$operator = '=';
	      }
	      switch ($request->range) {
	      	case '1-5': 
	      		$rangemin = 1000000;
	      		$rangemax = 5000000;
	      		break;
	      		case '5-10':
	      		$rangemin = 5000000;
	      		$rangemax = 10000000;
	      		break;
	      		case '10-15':
	      		$rangemin = 10000000;
	      		$rangemax = 15000000;
	      		break;
	      		case 'l15':
	      		$rangemin = 15000000;
	      		$rangemax = 999999999999999999999999999999999999999999999999999999999999999999999999;
	      		break;
	      		default:
	      		$rangemin = 0;
	      		$rangemax = 999999999999999999999999999999999999999999999999999999999999999999999999;
	      		break;
	      }
	    }
	    else{
	      $brand_id = 0;
	      $operator = '>';
	      $rangemin = 0;
	      $rangemax = 999999999999999999999999999999999999999999999999999999999999999999999999;
	    }
	    //lay chi tiet danh sach san pham va rating$brand_id
	    // echo $rangemin;
	    $product_info = DB::table('product')->leftJoin('review','review.product_id','=','product.id')->select('product.id','product.pro_name','product.pro_img','product.pro_price','product.price_sales','product.brand_id','product.is_sales','product.created_at',DB::raw('AVG(review.rating) as avg'))->whereIn('product.id',$list_id)->where('brand_id',$operator,$brand_id)->whereBetween('pro_price',[$rangemin,$rangemax])->groupBy('product.id')->orderBy($fill,$sort)->paginate($config);
	    return view('pages.cate',compact('product_info','cate_name','list_brand'));
    }

    
}
