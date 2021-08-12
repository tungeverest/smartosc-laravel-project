<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use App\Product;

class CartController extends Controller
{
    public function addCart($id)
    {
        if (count(DB::table('product')->where('id',$id)->first()) > 0) {
           $cart = DB::table('product')->where('id',$id)->first();
           if ($cart->price_sales) {
            $price = $cart->price_sales;
        }
        else{
            $price = $cart->pro_price;
        }
        Cart::add(['id' => $id, 
            'name' => $cart->pro_name, 
            'qty' => 1, 
            'price' => $price, 
            'options' => ['img' => $cart->pro_img]
        ]);
        return redirect('cart/')->with('success','Thêm vào giỏ hàng thành công');
    } else {
        return back()->with('err','Sản phẩm không tồn tại');
    }    	
}

public function ajaxAddCart()
{
    $id = $_GET['id'];
    $cart = DB::table('product')->where('id',$id)->first();
    if ($cart->price_sales) {
        $price = $cart->price_sales;
    }
    else{
        $price = $cart->pro_price;
    }
    Cart::add(['id' => $id, 
        'name' => $cart->pro_name, 
        'qty' => 1, 
        'price' => $price, 
        'options' => ['img' => $cart->pro_img]
    ]);
    $html = view('pages.ajaxCart')->render();
    return ($html);
}

public function removeCart($rowId)
{
    if($rowId == 'all'){
        Cart::destroy();
        return redirect()->back()->with('alert','Xóa giỏ hàng thành công');
    }
    else{
        Cart::remove($rowId);
        return redirect()->back()->with('alert','Xóa hàng thành công');
    }
}

public function updateCart(Request $request)
{
    $rowid = $request->rowid;
    $qty = $request->qty;
    Cart::update($rowid,['qty'=>$qty]);
    return back()->with('success','Update cart success') ;
}

public function getUpdateCart(Request $request){
    if ($request->qty ==0) {
        $data['totalAll'] = "0VND";
        $data['totalPrice'] = "0VND";
        echo json_encode($data);
    }
    else{
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
}
}
