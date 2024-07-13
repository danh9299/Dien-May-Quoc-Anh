<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
   
    public function index()
    {
        //
        $catalogs =  Catalog::orderBy('id', 'desc')->paginate(6);
        return view('admin.catalogs.index', ['catalogs' => $catalogs]);
    }
    public function search(Request $request)
    {
        $searchText = $request->input('search');
        $keywords = explode(' ', $searchText);
        $catalogs = Catalog::query();
        // Combine conditions for all keywords
        $catalogs->where(function ($query) use ($keywords) {
            foreach ($keywords as $keyword) {
                $keywordWithoutSpace = str_replace(' ', '', $keyword);
                $query->where(function ($subQuery) use ($keywordWithoutSpace) {
                    $subQuery->whereRaw("REPLACE(catalog_name, ' ', '') LIKE ?", ['%' . $keywordWithoutSpace . '%']);
                });
            }
        });
        $catalogs = $catalogs->orderBy('updated_at', 'desc')->paginate(10)->appends(['search' => $searchText]);
          return view('admin.catalogs.index', ['catalogs' => $catalogs]);
    }

    
    public function create()
    {
        //
        $catalogs = Catalog::all();

        return view('admin.catalogs.create', ['catalogs' => $catalogs]);
    }

    
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

   
    public function show(string $id)
    {
        //
    }

   
    public function edit(Catalog $catalog)
    {
        //
        $catalogs = Catalog::all();

        return view('admin.catalogs.edit', compact('catalog', 'catalogs'));
    }

    
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
        if($catalog->products->isNotEmpty()){
            $catalog->products()->update(['catalog_id'=>0]);
        }
        $catalog->delete();

        return redirect()->route('admin.catalogs.index')->with('success', 'Xóa danh mục thành công!');
    }
}