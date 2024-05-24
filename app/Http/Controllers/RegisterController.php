<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class RegisterController extends Controller
{
    //
    public function show()
    {
        $logo = Image::where('group', 1)->first();
        $main_catalogs = Catalog::where('parent_id', 0)->get();
        return view('main.auth.register', ['logo' => $logo, 'main_catalogs' => $main_catalogs]);
    }
    public function addnew(Request $request)
    {
        // Xác thực
        $request->validate([
            
            'password' => ['confirmed'],
            'email' => ['unique:users'],
        ]);

        // Tạo admin mới
        $user = new User();
       
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
        $user->email = $request->email;
      
        $user->save();



        return redirect()->route('main.auth.login')->with('success', 'Đăng ký thành viên thành công! Vui lòng đăng nhập để tiếp tục');
    }

}