<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\BrandAddRequest;
use Auth;
use App\Brand;

class BrandController extends Controller
{
	// bao gồm Tìm kiếm Brand, listting, add
  public function getList(Request $request) {
    if ($request->has('se')) {
      $search = "%$request->se%";
    }
    else{
      $search = '%_';
    }
    if ($request->has('f') && $request->has('so')) {
      $fill=$request->f;
      $sort=$request->so;
    }
    else{
      $fill = 'name';
      $sort = 'DESC';
    }
    $brand_list = Brand::where('name', 'like', $search)->orderBy($fill,$sort)->paginate(1);
    return view('admin.brand.list', compact('brand_list'));
  }

  public function postList(BrandAddRequest $request)
  {
    $brand_add = new Brand;
    $brand_add->name = $request->name;
    if (count(Brand::where('name', $request->name )->get()) > 0) {
      return redirect()->back()->with('err','Brand đã tồn tại');
    } else {
      $brand_add->brand_slug = str_slug($request->name);
      $brand_add->save();
      return redirect()->back()->with('alert','Thêm Brand thành công');
    }
  }

  public function getEdit($id) {
    $brand_edit = Brand::find($id);
    if( count($brand_edit) > 0) {
      return view('admin.brand.edit', compact('brand_edit'));
    } else{
     return redirect('admin/brand/list')->with('err', "Brand không tồn tại");
   }
 }

 public function postEdit(BrandAddRequest $edit, $id) 
 {
  if (count(Brand::where('id',$id)->first())> 0) {
    $brand_add = Brand::find($id);
    $brand_add->name = $edit->name;
    $check_name = count(Brand::where('id', '!=', $id)->where('name', 'like', $edit->name)->get());
    if ($check_name > 0){
      return redirect()->back()->with('err', "Brand đã tồn tại1");
    } else {
      $brand_add->brand_slug = str_slug($edit->name);
      $brand_add->save();

      return redirect('admin/brand/list')->with('alert', "Đã sửa Brand thành công");
    }
  } else {
   return back()->with('err','Thương hiệu không tồn tại');
 }
}

public function getDel($id)
{
 if (count(Brand::where('id',$id)->get()) > 0) {
  Brand::find($id)->delete();
  return redirect()->back()->with('alert','Delete thành công');
}
else{
  return redirect()->back()->with('err','Brand không tồn tại');
}
}
}
