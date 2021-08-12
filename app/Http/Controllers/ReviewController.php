<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function addReview(ReviewRequest $request,$id){
        $time = date("Y-m-d H:m:s");
        DB::insert('insert into review (name,email,phone,comment,rating,product_id,created_at) values(?,?,?,?,?,?,?)',[$request->name,$request->email,$request->phone,$request->comment,$request->ratting,$id,$time]);
        return back()->with('success','Gửi review thành công, đánh giá của bạn sớm được phê duyệt');
    }
}
