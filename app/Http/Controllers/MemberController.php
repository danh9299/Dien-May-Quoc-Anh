<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Validation\Rule;

class MemberController extends Controller
{

    public function index()
    {
        //
        $members = Admin::orderBy('created_at', 'desc')->paginate(6);
        return view('admin.members.index', ['members' => $members]);

    }

    public function search(Request $request)
    {
        $searchText = $request->input('search');
        $searchTextWithoutSpace = str_replace(' ', '', $searchText);
        $members = Admin::whereRaw("REPLACE(name, ' ', '') LIKE '%" . $searchTextWithoutSpace . "%'")->orWhereRaw("REPLACE(username, ' ', '') LIKE '%" . $searchTextWithoutSpace . "%'")->orderBy('created_at', 'desc')->paginate(6);
        return view('admin.members.index', ['members' => $members]);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function edit(Admin $member)
    {
        //


        return view('admin.members.edit', compact('member'));
    }


    public function update(Request $request, Admin $member)
    {
        $member = Admin::find($request->hidden_id);
        //
        $request->validate([
            'name' => 'required',
            'email' => [
                Rule::unique('admins')->ignore($member->id),
            ],
            'username' => 'required',
            'role' => 'required',
        ]);


        $member->name = $request->name;
        $member->username = $request->username;
        $member->email = $request->email;
        $member->role = $request->role;
        $member->save();

        // Chuyển hướng về trang danh sách tạp chí
        return redirect()->route('admin.members.index')->with('success', 'Cập nhật thành viên thành công!');
    }


    public function delete(Admin $member)
    {
        return view('admin.members.delete', compact('member'));
    }


    public function destroy(Admin $member)
    {
        //
        $member->delete();

        return redirect()->route('admin.members.index')->with('success', 'Xóa thành viên thành công!');
    }

    public function changeMemberPassword(Admin $member)
    {
        return view('admin.members.change-member-password', compact('member'));
    }
    public function changeMemberPasswordComplete(Request $request, Admin $member)
    {
        $member = Admin::find($request->hidden_id);

        if ($request->new_password != $request->new_password_confirmation) {
            return redirect()->back()->with('error', 'Mật khẩu mới không khớp nhau');
        }


        $member->password = bcrypt($request->new_password);
        $member->save();

        return redirect()->back()->with('success', 'Mật khẩu đã được thay đổi.');

    }
}
