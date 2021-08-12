<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ListimgRequest;
use App\Http\Controllers\Controller;
use App\Listimg;
use App\Product;
use Illuminate\Support\Facades\Storage;

class ListimgController extends Controller
{
    public function getList($id)
    {
        if (count(Product::where('id',$id)->first())> 0) {
            $product_name = Product::find($id);
            $list_img = Listimg::where('product_id', $id)->get();
            return view('admin.listimg.list',compact('list_img','product_name'));
        } else {
            return back()->with('err','Sản phẩm không tồn tại');
        }
    }

    public function postList(ListimgRequest $request, $id)
    {
        $list_add = new Listimg;
        $list_add->img_link= $request->link_img->store('image');
        $list_add->product_id = $id;
        $list_add->save();
        return redirect()->back()->with('alert','Thêm thành công');
    }

    public function getDel($id)
    {
        if (count(Listimg::where('id',$id)->first())> 0) {
            $list_name = Listimg::select('img_link')->where('id', $id)->get();
            $list_img = Storage::delete($list_name);
            $list_img = Listimg::find($id)->delete();

            return redirect()->back()->with('alert','Xóa thành công');
        } else {
            return back()->with('err','Ảnh không tồn tại');
        }
    }
}
