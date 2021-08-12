<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserAddRequest;
use App\User;
// use DateTime;

class UserController extends Controller
{
    public function getList(Request $request){
        if ($request->has('f') && $request->has('so')) {
            $fill=$request->f;
            $sort=$request->so;
        }
        else{
          $fill = 'name';
          $sort = 'DESC';
      }
      $user_list = User::orderBy($fill,$sort)->paginate(2);
      return view('admin.user.list', compact('user_list'));
  }
  public function getAdd() {
   return view('admin.user.add');
}

public function postAdd(UserAddRequest $request) {
   $user_add = new User;
   $user_add->name = $request->name;
   $user_add->password = bcrypt($request->password);
        // $user_add->created_at = new DateTime();
   $user_add->save();
   
   return redirect("admin/user/list")->with('alert',"Thêm mới thành công");
}

public function getEdit($id){
    if (count(User::where('id',$id)->first())> 0) {
        $user_edit = User::find($id);
        return view('admin.user.edit', compact('user_edit'));
    } else {
        return back()->with('err','User không tồn tại');
    }
}

public function postEdit(UserEditRequest $request,$id) {

    $user_edit = User::find($id);
    $user_edit->name = $request->name;
    $user_edit->password = bcrypt($request->password);
        // $user_edit->updated_at = new DateTime();
    $user_edit->save();
    
    return redirect("admin/user/list")->with('alert',"Sửa thành công");
}

public function getDel($id){
    if (count(User::where('id',$id)->first())> 0) {
        $user_del = User::find($id);
        if($user_del->id == 1){
            return back()->with('err',"Không thể xóa Admin");
        } else {
            $user_del->delete();
            return back()->with('alert',"Xóa thành công");
        }
    } else {
        return back()->with('err','User không tồn tại');
    }
}

}
