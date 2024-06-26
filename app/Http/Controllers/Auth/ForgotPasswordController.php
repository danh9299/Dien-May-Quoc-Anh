<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    //
    public function showLinkRequestForm()
    {
        return view('main.auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Check if the password reset link was sent successfully
        if ($status === Password::RESET_LINK_SENT) {
            return redirect()->back()->with(['status' => __($status), 'email' => $request->email]);
        } else {
            return redirect()->back()->with('status', 'Không tìm thấy email bạn yêu cầu hoặc có lỗi xảy ra!');
        }
    }
}
