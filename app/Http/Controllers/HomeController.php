<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Brand;
use App\Banner;
use App\Product;
use App\Order;
use App\OrderDetail;
use Auth;
use App\Listcate;
use App\Listimg;
use App\Review;
use Cart,Session;

class HomeController extends Controller
{
    public function getHome()
    {
        $brand_list = DB::select('SELECT name FROM brand ORDER BY name');
        $banner_list = DB::select('SELECT banner_name, slide_position FROM banner WHERE slide_position != 0 ORDER BY slide_position');
        $banner_min = collect(DB::select('SELECT slide_position FROM banner WHERE slide_position != 0 ORDER BY slide_position'))->first();
        $banner_count = count($banner_list);
        $value = Cookie::get('firsttime');
        if ($value) {
            $first_time = false;
        }
        else{
            $first_time = true;
            Cookie::queue('firsttime', 'true', 9999999);
        }

            // //off strict mode trong config database, strict mode chi cho phep full group, k sua thu vien trong framwork
        $product = DB::table('product')->leftJoin('review','review.product_id','=','product.id')->select('product.id','product.pro_name','product.pro_img','product.pro_price','product.price_sales','product.is_sales',DB::raw('AVG(review.rating) as avg'))->groupBy('product.id')->orderBy('product.id','DESC')->paginate(4);
        return view('pages.home',compact('product','brand_list','first_time','banner_list','banner_min','banner_count'));
    }

    public function getDetail($id)
    {
        if (count(DB::table('product')->where('id',$id)->first()) > 0) {
            $product = DB::table('product')->where('id',$id)->first();
            $list_img = DB::table('listimg')->where('product_id',$id)->get();
            $img_count = count($list_img);
            $review = DB::table('review')->where('product_id',$id)->where('approve',1)->orderBy('created_at','DESC')->paginate(4);
            $reviewavg = collect(DB::select('select AVG(rating) as avg from review where product_id = ?',[$id]))->first();
            $totalreview = collect(DB::select('select COUNT(id) as total from review where product_id = ? and approve = 1',[$id]))->first();
            return view('pages.detail', compact('product','list_img','img_count','review','id','reviewavg','totalreview'));
        } else {
            return back()->with('err','Sản phẩm không tồn tại');
     }

 }


 public function getCart()
 {
    $list = Cart::content();
    $totalAll = Cart::total();
    return view('pages.cart',compact('list','totalAll'));
}

public function postCart(OrderRequest $request)
{
    try {
        DB::beginTransaction();
        $order = array(
            'total' => Cart::total(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'notes' => $request->notes
        );
        Order::create($order);
        $order_id = Order::all()->last()->id;
        foreach (Cart::content() as $key => $value) {
            $order_detail[$key]['order_id'] = $order_id;
            $order_detail[$key]['product_id'] = $value->id;
            $order_detail[$key]['soluong'] = $value->qty;
            $order_detail[$key]['price'] = $value->price;
            $order_detail[$key]['sum'] = $value->total;
        }
        OrderDetail::insert($order_detail);
        DB::commit();
        Session::flush();
        Session::flash('alert','Mua hàng thành công');
        return redirect()->intended('hoan-thanh');
    } catch (Exception $e) {
        DB::rollBack();
        return back()->with('alert','Có lỗi xảy ra vui lòng thử lại');
    }
}

public function getUpdateCart(Request $request){
    Cart::update($request->rowId,$request->qty);
    $data['totalAll'] = Cart::total()."VND";
    $content = Cart::content();
    foreach ($content as $key => $value) {
        if($value->rowId == $request->rowId){
            $data['totalPrice'] = number_format($value->price*$value->qty)."VND";
        }
    }
    echo json_encode($data);
}

public function getDone()
{
    return view('pages.hoanthanh');
}

}
