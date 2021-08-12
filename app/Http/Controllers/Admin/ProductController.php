<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductEditRequest;
use App\Product;
use App\Category;
use App\Listcate;
use App\Listimg;
use App\Banner;
use App\Brand;

class ProductController extends Controller
{
    public function getList(Request $request)
    {
        if ($request->has('pro_search')) {
          $pro_search = "%$request->pro_search%";
      } else{
          $pro_search = '%_';
      }
      if ($request->has('fill') && $request->has('sort')) {
          $pro_fill = $request->fill;
          $pro_sort = $request->sort;
      }
      else{
          $pro_fill = 'pro_name';
          $pro_sort = 'DESC';
      }
      $product_list = Product::where('pro_name', 'like', $pro_search)->orderBy($pro_fill,$pro_sort)->paginate(1);
      return view('admin.product.list', compact('product_list'));
  }

  public function getAdd()
  {
    	//lay cac hang
     $brandInfo  = Brand::all();
    	//lay cac cac catalog cuoi cung
     $cateInfo = Category::all();
     return view('admin.product.add',compact('brandInfo','cateInfo'));
 }

 public function postAdd(ProductRequest $request)
 {
    try {
        DB::beginTransaction();
            //tao decription
        if ($request->sale>0) {
            $is_sale =1;
        }
        else{
            $is_sale=0;
        }
        $pro_img = $request->pro_img->store('image/pro_img');
        $product = [
            'pro_name' =>$request->name,
            'pro_slug' => str_slug($request->name),
            'pro_price' =>$request->price,
            'price_sales' =>$request->sale,
            'pro_img' =>$pro_img,
            'is_sales' =>$is_sale,
            'description' =>$request->description,
            'xuat_xu' =>$request->xuat_xu,
            'bao_hanh' => $request->bao_hanh,
            'tinh_trang' =>$request->tinh_trang,
            'trang_thai' =>$request->trang_thai,
            'brand_id' =>$request->brand_id,
        ];
        Product::create($product);
        $pro_id = Product::all()->last()->id;
        
        $banner_add = new Banner;
        if ($request->banner_name != false) {
            $banner_add->banner_name = $request->banner_name->store('banner');
            $banner_add->product_id = $pro_id;
            $banner_add->slide_position = 0;
            $banner_add->save();
        }
        
        if ($request->listimg != false) {
            foreach ($request->listimg as $key => $value) {
                $listImg[$key]['img_link'] = $value->store('image');
                $listImg[$key]['product_id'] = $pro_id;
            }
            Listimg::insert($listImg);
        }

            // tao listcat
        foreach ($request->category as $key => $value) {
            $listCate[$key]['category_id'] = $value;
            $listCate[$key]['product_id'] = $pro_id;
        }
        Listcate::insert($listCate);
        DB::commit();
        return redirect("admin/product/list")->with('alert','Thêm mới sản phẩm thành công');
    } 
    catch (Exception $e) {
        DB::rollBack();
        return back()->with('alert','Thêm mới sản phẩm thất bại');
    }
}

public function getEdit($id)
{
    if (count(Product::where('id',$id)->first())> 0) {
            //lay cac hang
        $brandInfo  = Brand::all();
            //lay cac cac catalog cuoi cung
        $productInfo = Product::find($id);
        $list_cate_info = DB::table('listcate')->leftJoin('category','category.id','=','listcate.category_id')->select('category.id as id','category.name')->where('product_id',$id)->get();
            // dump($list_cate_info);
        return view('admin.product.edit',compact('productInfo','list_cate_info','brandInfo'));
    }
    else{
        return back()->with('err','Product không tồn tại');
    }

}

public function postEdit(ProductEditRequest $request)
{
    if ($request->price_sales > 0) {
        $is_sales = 1;
    }
    else{
        $is_sales = 0;
    }
    $product = Product::find($request->id);
    $product->pro_name = $request->name;
    $product->pro_slug = str_slug($request->name);
    $product->pro_price = $request->price;
    $product->price_sales = $request->sale;
    $product->is_sales = $is_sales;
    $product->description = $request->description;
    $product->xuat_xu = $request->xuat_xu;
    $product->bao_hanh = $request->bao_hanh;
    $product->tinh_trang = $request->tinh_trang;
    $product->trang_thai = $request->trang_thai;
    $product->brand_id = $request->brand_id;
    if ($request->hasFile('pro_img')) {
        Storage::delete($product->pro_img);
        $product->pro_img = $request->pro_img->store('image/pro_img');
    }
    $product->save();
    return redirect("admin/product/list")->with('alert','Sửa sản phẩm thành công');
}

public function getDel($id)
{
    if (count(Product::where('id',$id)->first())> 0) {
        $list_img = Listimg::select('img_link')->where('product_id', $id)->get();
        foreach ($list_img as $key => $value) {
            Storage::delete($value->img_link);
        }       
        $product_del  = Product::find($id);
        if (Storage::delete($product_del->pro_img)) {
            $product_del->delete();
            return back()->with('alert','Xóa sản phẩm thành công');
        } else {
            return back()->with('err','Xóa Ảnh sản phẩm không thành công');
        }
    } else {
        return back()->with('err','Sản phẩm không tồn tại');
    }
}

}
