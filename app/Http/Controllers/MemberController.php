<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin;
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $members = Admin::orderBy('created_at', 'desc')->paginate(6);
        return view('admin.members.index', ['members' => $members]);

    }

    public function search(Request $request){
        $searchText = $request->input('search');
        $searchTextWithoutSpace = str_replace(' ', '', $searchText);
        $members = Admin::whereRaw("REPLACE(name, ' ', '') LIKE '%" . $searchTextWithoutSpace . "%'")->orWhereRaw("REPLACE(username, ' ', '') LIKE '%" . $searchTextWithoutSpace . "%'")->orderBy('created_at', 'desc')->paginate(6);
        return view('admin.members.index', ['members' => $members]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $member)
    {
        //
      

        return view('admin.members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $member)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'role' => 'required',
        ]);

        $member = Admin::find($request->hidden_id);
        $member->name = $request->name;
        $member->username = $request->username;
        $member->email = $request->email;
        $member->role = $request->role;
        $member->save();

        // Chuyển hướng về trang danh sách tạp chí
        return redirect()->route('admin.members.index')->with('success', 'Cập nhật thành viên thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Admin $member){
        return view('admin.members.delete', compact('member'));
    }


    public function destroy(Admin $member)
    {
        //
        $member->delete();

        return redirect()->route('admin.members.index')->with('success', 'Xóa thành viên thành công!');
    }
}
