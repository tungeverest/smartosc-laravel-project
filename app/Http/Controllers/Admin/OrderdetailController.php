<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;

class OrderdetailController extends Controller
{
    function getList($id){
    	if (count(Order::where('id',$id)->first())> 0) {
        $detail_list = OrderDetail::where('order_id',$id)->paginate(2);
        return view('admin.order.detail_list',compact('detail_list','id'));
        } else {
            return back()->with('err','Order không tồn tại');
        }
    }
}
