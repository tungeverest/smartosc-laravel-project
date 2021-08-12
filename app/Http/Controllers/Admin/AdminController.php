<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

class AdminController extends Controller
{
    public function getIndex()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.layout.home');
        } else {
            return redirect('login');
        }

    }
}
