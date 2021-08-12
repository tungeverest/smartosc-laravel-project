<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryAddRequest;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Listcate;

class CategoryController extends Controller
{
	public function getList(){
		$cate_list = Category::paginate(5);
		return view('admin.category.list', compact('cate_list'));
	}

	public function getAdd()
	{
		$category_list = Category::where('level','<',3)->orderBy('level','ASC')->get();
		return view('admin.category.add',compact('category_list'));

	}
	public function postAdd(CategoryAddRequest $request){
		$category = new Category;
		$category->name = $request->name;
		$category->category_slug = str_slug($request->name);
		$category->parent_id = $request->parent_id;
		$check_level = Category::find($request->parent_id);

		if ($check_level == false) {
			$category->level = 1;
			$category->save();
			return redirect("admin/category/list")->with('alert','Thêm thành công');
		}

		elseif ($check_level->level < 3) {
			$category->level = $check_level->level+1;
			$category->save();
			return redirect("admin/category/list")->with('alert','Thêm thành công');
		} else{
			return redirect("admin/category/add")->with('err','Mega Menu chỉ hiện tối đa 3 cấp');
		}
	}

	public function getEdit($id){
		$category_edit = Category::find($id);
		if( count($category_edit) > 0) {
			$category_list = Category::where('level','<',3)->where('id','!=', $id)->orderBy('level','ASC')->get();
			$cate_id= Category::find($id);
			return view('admin.category.edit', compact('cate_id', 'category_list'));
		} else{
			return redirect('admin/category/list')->with('err', "Category không tồn tại");
		}
	}

	public function postEdit(CategoryRequest $request,$id){
		if (count(Category::where('id',$id)->first())> 0) {
			$cate_id = Category::find($id);
    //tìm thẻ > cha
			$check_level = Category::find($request->parent_id);
			$category = Category::find($id);
			$category->name = $request->name;
			$category->category_slug = str_slug($request->name);
			$category->parent_id = $request->parent_id;
			if ($check_level == false) {
				$category->level = 1;
				$category->save();
				return redirect("admin/category/list")->with('alert','Sửa thành công');
			}
    // Kiểm tra level của thẻ cha
			elseif ($check_level->level < 3) {
				$category->level = $check_level->level+1;
				$category->save();
				return redirect("admin/category/list")->with('alert','Sửa thành công');
			} else{
				return back()->with('err','Mega Menu chỉ hiện tối đa 3 cấp');
			}
		} else {
			return back()->with('err','Category không tồn tại');
		}
	}

	public function getDel($id)
	{
		if (count(Category::where('id',$id)->first()) > 0) {
			try { 
				DB::beginTransaction();
          //delete cac row lien quan
				Category::find($id)->delete();
				Category::where('parent_id',$id)->delete();
          //commit
				DB::commit();
				return redirect('admin/category/list')->with('alert','Delete thành công');

			} catch (Exception $e) {
				DB::rollBack();
				return redirect('admin/category/list')->with('err','Delete thất bại');
			}
		} else{
			return redirect('admin/category/list')->with('err','Category không tồn tại');
		}
	}
}
