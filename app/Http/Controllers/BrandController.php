<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $brands =  Brand::orderBy('id', 'desc')->paginate(6);
        return view('admin.brands.index', ['brands' => $brands]);
    }
    public function search(Request $request)
    {
        $searchText = $request->input('search');
        $keywords = explode(' ', $searchText);
        $brands = Brand::query();
        // Combine conditions for all keywords
        $brands->where(function ($query) use ($keywords) {
            foreach ($keywords as $keyword) {
                $keywordWithoutSpace = str_replace(' ', '', $keyword);
                $query->where(function ($subQuery) use ($keywordWithoutSpace) {
                    $subQuery->whereRaw("REPLACE(name, ' ', '') LIKE ?", ['%' . $keywordWithoutSpace . '%']);
                });
            }
        });
        $brands = $brands->orderBy('updated_at', 'desc')->paginate(10)->appends(['search' => $searchText]);
          return view('admin.brands.index', ['brands' => $brands]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            
        ]);
        $brand = new Brand;
        $brand->name = $request->name;
        

        $brand->save();
        return redirect()->route('admin.brands.index')->with('success', 'Thêm mới hãng thành công');
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
    public function edit(Brand $brand)
    {
        //
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        //
        $request->validate([
            'name' => 'required',
            
        ]);

        $brand = Brand::find($request->hidden_id);
        $brand->name = $request->name;
       
        $brand->save();

        // Chuyển hướng về trang danh sách tạp chí
        return redirect()->route('admin.brands.index')->with('success', 'Cập nhật hãng thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function delete(Brand $brand){
        return view('admin.brands.delete', compact('brand'));
    }
    public function destroy(Brand $brand)
    {
        //
        if($brand->products->isNotEmpty()){
            $brand->products()->update(['brand_id'=>0]);
        }
        $brand->delete();

        return redirect()->route('admin.brands.index')->with('success', 'Xóa hãng thành công!');
    }
}
