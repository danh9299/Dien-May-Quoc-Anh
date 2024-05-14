<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminRegisterController extends Controller
{
    //
    public function show(){
        return view('admin.auth.register.show');
    }

    public function register(Request $request)
    {
        // Xác thực
        $request->validate([
            'username' => ['required', 'unique:admins'],
            'password' => ['required', 'confirmed'],
            'name' => ['required'],
            'email' => ['required', 'unique:admins'],
            'role' => ['required'],
        ]);

        // Tạo admin mới
        $admin = new Admin();
        $admin->username = $request->username;
        $admin->password = bcrypt($request->password);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->role = $request->role;
        $admin->save();


        
        return redirect()->route('admin.members.index')->with('success', 'Đăng ký thành viên thành công!');
    }
    }


