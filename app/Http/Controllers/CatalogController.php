<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $catalogs = Catalog::all();

        return view('admin.catalogs.index', ['catalogs' => $catalogs]);
    }
    public function search(Request $request)
    {
        $searchText = $request->input('search');
        $catalogs = Catalog::where('catalog_name', 'LIKE', '%' . $searchText . '%')->get();
        return view('admin.catalogs.index', ['catalogs' => $catalogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $catalogs = Catalog::all();

        return view('admin.catalogs.create', ['catalogs' => $catalogs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'catalog_name' => 'required',
            'parent_id' => 'required',
        ]);
        $catalog = new Catalog;
        $catalog->catalog_name = $request->catalog_name;
        $catalog->parent_id = $request->parent_id;

        $catalog->save();
        return redirect()->route('admin.catalogs.index')->with('success', 'Thêm mới danh mục thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Catalog $catalog)
    {
        //
        $catalogs = Catalog::all();

        return view('admin.catalogs.edit', compact('catalog', 'catalogs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Catalog $catalog)
    {
        //
        $request->validate([
            'catalog_name' => 'required',
            'parent_id' => 'required',
        ]);

        $catalog = Catalog::find($request->hidden_id);
        $catalog->catalog_name = $request->catalog_name;
        $catalog->parent_id = $request->parent_id;
        $catalog->save();

        // Chuyển hướng về trang danh sách tạp chí
        return redirect()->route('admin.catalogs.index')->with('success', 'Cập nhật danh mục thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function delete(Catalog $catalog)
    {
        return view('admin.catalogs.delete', compact('catalog'));
    }
    public function destroy(Catalog $catalog)
    {
        //
        if ($catalog->children->isNotEmpty()) {
            // Cập nhật parent_id của các danh mục con về 0
            $catalog->children()->update(['parent_id' => 0]);
        }
        $catalog->delete();

        return redirect()->route('admin.catalogs.index')->with('success', 'Xóa danh mục thành công!');
    }
}