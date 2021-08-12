<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\ConfigRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ConfigController extends Controller
{
    public function getConfig(){
        $config = File::get('category.config');
        return view('admin.config.list',compact('config'));
    }

    public function set(ConfigRequest $request){
        $config = File::put('category.config',$request->config);
        return back()->with('alert','Thay đổi config thành công');
    }
}
