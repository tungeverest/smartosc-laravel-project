<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Review;

class ReviewController extends Controller
{
  public function getList(Request $request)
  {
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
      $fill = 'time';
      $sort = 'DESC';
    }
    $list_review = DB::table('review')->where('approve',0)->leftJoin('product','review.product_id','=','product.id')->select('review.id','product.id as pro_id','review.comment','review.rating','product.pro_name','review.created_at as time','review.name','review.phone','review.email')->orderBy($fill,$sort)->where('pro_name','like',$search)->paginate(2);
    return view('admin.review.list',compact('list_review'));
  }

  public function approve($id)
  {
   try {
    if (count(Review::where('id',$id)->first())> 0) {
      Review::find($id)->update(['approve'=>1]);
      return back()->with('alert','Phê duyệt thành công');
    } else {
      return back()->with('err','Đánh giá không tồn tại');
    }    		
  } catch (Exception $e) {
    return back()->with('alert','Phê duyệt thất bại');
  }
}

public function delete($id)
{
  if (count(Review::where('id',$id)->first())> 0) {
   try {
    Review::find($id)->delete();
    return back()->with('alert','Delete thành công');

  } catch (Exception $e) {
    return back()->withd('alert','Delete thất bại');
  }
} else {
  return back()->with('err','Đánh giá không tồn tại');
}       
}
}
