<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function show()
    {

        return view('main.auth.register');
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
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;

        $user->save();



        return redirect()->route('main.auth.login')->with('success', 'Đăng ký thành viên thành công! Vui lòng đăng nhập để tiếp tục');
    }

    public function edit()
    {
        $account = auth()->guard('web')->user();
        return view('main.auth.edit', compact('account'));

    }
    public function update(Request $request)
    {
        $account = auth()->guard('web')->user();
        $request->validate([

            'email' => [
                Rule::unique('users')->ignore($account->id),
            ],


        ]);

        $account->name = $request->name;
        $account->email = $request->email;
        $account->address = $request->address;
        $account->phone_number = $request->phone_number;
        $account->save();
        return redirect()->route('main.auth.edit')->with('success', 'Cập nhật Thông tin cá nhân thành công');

    }

    public function changePassword()
    {
        return view('main.auth.changePassword');
    }

    public function changePasswordComplete(Request $request)
    {

        $user = auth()->guard('web')->user();

        if ($request->new_password != $request->new_password_confirmation) {
            return redirect()->back()->with('error', 'Mật khẩu mới không khớp nhau');
        }
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Mật khẩu hiện tại không đúng.');
        }


        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Mật khẩu đã được thay đổi.');
    }

}
