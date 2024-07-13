<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{

    public function index()
    {
        //
        $types = Type::orderBy('id', 'desc')->paginate(6);
        return view('admin.types.index', ['types' => $types]);
    }
    public function search(Request $request)
    {
        $searchText = $request->input('search');
        $searchTextWithoutSpace = str_replace(' ', '', $searchText);
        $types = Type::whereRaw("REPLACE(name, ' ', '') LIKE '%" . $searchTextWithoutSpace . "%'")->paginate(6);
        return view('admin.types.index', ['types' => $types]);
    }

    public function create()
    {
        //
        return view('admin.types.create');
    }


    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',

        ]);
        $type = new Type;
        $type->name = $request->name;


        $type->save();
        return redirect()->route('admin.types.index')->with('success', 'Thêm mới phân loại thành công');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(Type $type)
    {
        //
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        //
        $request->validate([
            'name' => 'required',

        ]);

        $type = Type::find($request->hidden_id);
        $type->name = $request->name;

        $type->save();

        // Chuyển hướng về trang danh sách tạp chí
        return redirect()->route('admin.types.index')->with('success', 'Cập nhật phân loại thành công!');

    }
    public function delete(Type $type)
    {
        return view('admin.types.delete', compact('type'));
    }


    public function destroy(Type $type)
    {
        //
        if ($type->products->isNotEmpty()) {
            $type->products()->update(['type_id' => 0]);
        }
        $type->delete();

        return redirect()->route('admin.types.index')->with('success', 'Xóa phân loại thành công!');
    }
}
