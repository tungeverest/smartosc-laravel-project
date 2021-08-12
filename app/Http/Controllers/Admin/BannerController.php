<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\BannerEditRequest;
use App\Banner;
use App\Product;

class BannerController extends Controller
{
	public function getList() {
		// $product_name = Product::find($id);
		$list = Banner::all();
		return view('admin.banner.list',compact('list'));
	}

	public function postList(BannerEditRequest $request) {
		$banner_id = Banner::find($request->banner_id);
		$check_pos = count( Banner::where('slide_position','!=', 0)->where('slide_position', $request->slide_position)->get());
		if ($request->slide_position == 0) {
			$banner_id->slide_position = 0;
			$banner_id->save();
			return back()->with('alert','Banner đã về trạng thái ẩn');
		} elseif ($check_pos < 1){
			$banner_id->slide_position = $request->slide_position;
			$banner_id->save();
			return back()->with('alert','Cập nhập banner thành công');
		} else {
			$banner_swift = Banner::where('slide_position', $request->slide_position)->first();
			$banner_swift->slide_position = $banner_id->slide_position;
			$banner_swift->save();

			$banner_id->slide_position = $request->slide_position;
			$banner_id->save();
			return back()->with('alert','Banner đã thay đổi vị trí thành công');
		}
	}

	public function getAdd($id) 
	{
		if (count(Product::where('id',$id)->first())> 0) {
		$product_name = Product::find($id);
		$list_banner = Banner::where('product_id', $id)->get();
		return view('admin.banner.listbanner',compact('list_banner','product_name'));
		} else {
            return back()->with('err','Sản phẩm không tồn tại');
        }
	}

	public function postAdd(BannerRequest $request, $id) {
		$banner_add = new Banner;
		$banner_add->banner_name = $request->banner_name->store('banner');
		$banner_add->product_id = $id;
		$banner_add->slide_position = 0;
		$banner_add->save();
		return redirect('admin/banner/list')->with('alert','Thêm banner thành công');
		$product_name = Product::find($id);
		$list_banner = Banner::where('product_id', $id)->get();
		return view('admin.banner.listbanner',compact('list_banner','product_name'));
	}

	public function getDel($id) 
	{
		if (count(Banner::where('id',$id)->first())> 0) {
		$banner_del = Banner::find($id);
		$banner_del->delete();
		return back()->with('alert', 'Xóa banner thành công');
		} else {
            return back()->with('err','Banner không tồn tại');
        }
	}
}
