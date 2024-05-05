<?php

namespace App\Http\Controllers;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $features =  Feature::orderBy('id', 'desc')->paginate(6);
        return view('admin.features.index', ['features' => $features]);
    }
    public function search(Request $request)
    {
        $searchText = $request->input('search');
        $searchTextWithoutSpace = str_replace(' ', '', $searchText);
        $features = Feature::whereRaw("REPLACE(name, ' ', '') LIKE '%" . $searchTextWithoutSpace . "%'")->paginate(6);
        return view('admin.features.index', ['features' => $features]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.features.create');
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
        $feature = new Feature;
        $feature->name = $request->name;
        

        $feature->save();
        return redirect()->route('admin.features.index')->with('success', 'Thêm mới Thiết kế thành công');
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
    public function edit(Feature $feature)
    {
        //
        return view('admin.features.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feature $feature)
    {
        //
        $request->validate([
            'name' => 'required',
            
        ]);

        $feature = Feature::find($request->hidden_id);
        $feature->name = $request->name;
       
        $feature->save();

        // Chuyển hướng về trang danh sách tạp chí
        return redirect()->route('admin.features.index')->with('success', 'Cập nhật Thiết kế thành công!');
        
    }
    public function delete(Feature $feature){
        return view('admin.features.delete', compact('feature'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {
        //
        $feature->delete();

        return redirect()->route('admin.features.index')->with('success', 'Xóa Thiết kế thành công!');
    }
}
