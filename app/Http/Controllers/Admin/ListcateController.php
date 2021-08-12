<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ListcateRequest;
use App\Http\Controllers\Controller;
use App\Product;
use App\Listcate;
use App\Category;


class ListcateController extends Controller
{
    public function getList($id)
    {
        if (count(Product::where('id',$id)->first())> 0) {
    	$list_cate = Listcate::where('product_id', $id)->get();
    	$cate_add = Category::whereNotIn('id',Listcate::select('category_id')->where('product_id',$id)->get())->get();
        $product_name = Product::find($id);
        
        return view('admin.listcate.list',compact('list_cate','product_name','cate_add'));
    } else {
        return back()->with('err','Sản phẩm không tồn tại');
    }
}

    public function postList(ListcateRequest $request,$id)
    {
        
        $listcate_add = new Listcate;
        $listcate_add->category_id = $request->cate_id;
        $listcate_add->product_id = $id;
        $listcate_add->save();
        return redirect()->back()->with('alert','Thêm thành công');
    }

    public function getDel($id)
    {
        if (count(Listcate::where('id',$id)->first())> 0) {
        $cate_id = Listcate::find($id);
        $cate_id->delete();
        return redirect()->back()->with('alert','Xóa thành công');
    } else {
        return back()->with('err','Category list không tồn tại');
    }
    }
}
