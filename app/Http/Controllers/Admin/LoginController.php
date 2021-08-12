<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\User;
use Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        if (Auth::guard('admin')->check()) {
            return redirect('admin');
        } else {
            return view('admin.login');
        }
    }

    public function postLogin(LoginRequest $request)
    {
        $admin = [
            'name' => $request->name,
            'password' => $request->password
        ];
        //kiểm tra tồn tại trong cơ sơ dữ liệu
        if (Auth::guard('admin')->attempt($admin)) {
            return redirect('admin');          
        } else {
            return redirect()->back()->with('err', 'Login failed!');
        }
    }
    
    public function getLogout()
    {
        Auth::guard('admin')->logout();
        return redirect('login');

    }
}
