<?php
/**
 * Created by PhpStorm.
 * User: baohan-baotran
 * Date: 10/5/2017
 * Time: 9:13 AM
 */
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReportController
{

    public function getAll(Request $request) {
        $startday = $request->start;
        $endday = $request->end;

    //validate

        $validator = Validator::make($request->all(),
            [
                'start'=>'required|before_or_equal:'.date('y-m-d'),
                'end'=>'required|after_or_equal:'.$startday,
            ],
            [
                'start.required'=>'Ban chua nhap ngay bat dau',
                'start.before_or_equal'=> 'Ngay bat dau phai dien ra truoc thoi diem nay',
                'end.required'=>'Ban chua nhap ngay ket thuc',
                'end.after_or_equal'=>'ngay ket thuc phai dien ra sau',
            ]);
        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput();
        }
     //get best selling
        $selling = DB::table('orderdetail')
        ->join('product', 'product.id', '=', 'orderdetail.product_id')
        ->whereBetween('orderdetail.created_at',array($startday,$endday))
        ->select('product.id','product.pro_name','product.pro_price', DB::raw('SUM(orderdetail.soluong) as total'), DB::raw('SUM(orderdetail.sum) as sumMoney'))
        ->groupBy('orderdetail.product_id','product.id','product.pro_name','product.pro_price')
        ->take(5)->get();
        var_dump($selling);
        die;
        $selling=json_decode($selling,true);

       // get best catagory
        $rateCata=DB::table('category')
        ->where('parent_id',0)
        ->join('listcate','category.id','=','listcate.category_id')
        ->join('orderdetail', 'listcate.product_id', '=', 'orderdetail.product_id')
        ->whereBetween('orderdetail.created_at',array($startday,$endday))
        ->select('category.id','category.name', DB::raw('SUM(orderdetail.soluong) as total'))
        ->groupBy('category.id','category.name')
        ->take(5)->get();
        $rateCata=json_decode($rateCata,true);
        //input for order chart
        $orders = DB::table('order')->count();
        $count=array(); $count[]=0;
        $year=date("Y");
        for($i=1;$i<=12;$i++)
            if($i<10)
                $count[] = DB::table('order')->where('created_at','like',$year.'-0'.$i.'-%')->count();
            else   $count[] = DB::table('order')->where('created_at','like',$year.'-'.$i.'-%')->count();

             return view('admin.report.report')->with('selling',$selling)->with('rateCata',$rateCata)
             ->with('orders',$orders)->with('count',$count);
         }
     }