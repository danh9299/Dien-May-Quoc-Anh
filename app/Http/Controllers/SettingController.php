<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Footer;
use App\Models\Policy;

class SettingController extends Controller
{
    //
    public function index()
    {
        return view('admin.settings.index');
    }

    public function editGeneral()
    {
        $footer = Footer::where('id', 1)->first();
        return view('admin.settings.footer.general', compact('footer'));
    }
    public function updateGeneral(Request $request)
    {
        $footer = Footer::where('id', 1)->first();
        $footer->address = $request->address;
        $footer->email = $request->email;
        $footer->hotline1 = $request->hotline1;
        $footer->hotline2 = $request->hotline2;
        $footer->hotline3 = $request->hotline3;
        $footer->hotline4 = $request->hotline4;
        $footer->save();
        return redirect()->route('admin.settings.general.edit')->with('success', 'Cập nhật Thông tin công ty thành công');
    }
    public function editNetwork()
    {
        $footer = Footer::where('id', 1)->first();
        return view('admin.settings.footer.network', compact('footer'));
    }
    public function updateNetwork(Request $request)
    {
        $footer = Footer::where('id', 1)->first();
        $footer->link_facebook = $request->link_facebook;
        $footer->link_instagram = $request->link_instagram;
        $footer->link_tiktok = $request->link_tiktok;

        $footer->save();
        return redirect()->route('admin.settings.network.edit')->with('success', 'Cập nhật Mạng xã hội thành công');
    }

    public function editAccountInfo(Request $request)
    {
        $account = auth()->guard('admin')->user();
        return view('admin.settings.account.edit', compact('account'));
    }
    public function updateAccountInfo(Request $request)
    {
        $account = auth()->guard('admin')->user();
        $request->validate([

            'email' => [
                Rule::unique('admins')->ignore($account->id),
            ],


        ]);

        $account->name = $request->name;
        $account->email = $request->email;
        $account->username = $request->username;
        $account->save();
        return redirect()->route('admin.settings.account.edit')->with('success', 'Cập nhật Thông tin cá nhân thành công');
    }
    public function editSecure()
    {
        $policy = Policy::where('group', 'secure')->first();
        return view('admin.settings.policy.secure', compact('policy'));
    }
    public function updateSecure(Request $request)
    {
        $policy = Policy::where('group', 'secure')->first();
        $policy->content = $request->content;

        $policy->save();
        return redirect()->route('admin.settings.policy.secure')->with('success', 'Cập nhật Chính sách thành công');

    }
    public function editService()
    {
        $policy = Policy::where('group', 'service')->first();
        return view('admin.settings.policy.service', compact('policy'));
    }
    public function updateService(Request $request)
    {
        $policy = Policy::where('group', 'service')->first();
        $policy->content = $request->content;

        $policy->save();
        return redirect()->route('admin.settings.policy.service')->with('success', 'Cập nhật Chính sách thành công');

    }
    public function editReturn()
    {
        $policy = Policy::where('group', 'return')->first();
        return view('admin.settings.policy.return', compact('policy'));
    }
    public function updateReturn(Request $request)
    {
        $policy = Policy::where('group','return')->first();
        $policy->content = $request->content;

        $policy->save();
        return redirect()->route('admin.settings.policy.return')->with('success', 'Cập nhật Chính sách thành công');

    }

    public function changePassword()
    {
        return view('admin.settings.account.changePassword');
    }

    public function changePasswordComplete(Request $request)
    {
      
        $user = auth()->guard('admin')->user();
      
        if($request->new_password != $request->new_password_confirmation){
            return redirect()->back()->with('error', 'Mật khẩu mới không khớp nhau');
        }

        if ( !Hash::check($request->current_password, $user->password) ) {
            return redirect()->back()->with('error', 'Mật khẩu hiện tại không đúng.');
        }
      
      
        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Mật khẩu đã được thay đổi.');
    }
}