<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    function getList(Request $request){
        if ($request->has('se')) {
            $search = "%$request->se%";    	}
        else{
            $search = '%_';
        }
        if ($request->has('f')&&$request->has('so')) {
            $fill=$request->f;
            $sort=$request->so;
        }
        else{
            $fill = 'created_at';
            $sort = 'DESC';
        }
        $order_list = Order::where('done',0)->orderBy($fill,$sort)->where('name','like',$search)->paginate(1);
        return view('admin.order.list',compact('order_list'));
    }

    function done($id){
        if (count(Order::where('id',$id)->first())> 0) {
        try{
            $order = Order::find($id)->update(['done'=>1]);
            return back()->with('alert','Hoàn thành đơn hàng thành công');
        }
        catch (Exception $e){
            return back()->with('alert','Hoàn thành đơn hàng thất bại');
        }
        } else {
            return back()->with('err','Đơn hàng không tồn tại');
        }
    }
}
