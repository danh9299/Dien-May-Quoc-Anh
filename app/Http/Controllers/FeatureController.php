<?php

namespace App\Http\Controllers;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
   
    public function index()
    {
        //
        $features =  Feature::orderBy('id', 'desc')->paginate(6);
        return view('admin.features.index', ['features' => $features]);
    }
    public function search(Request $request)
    {
        $searchText = $request->input('search');
        $keywords = explode(' ', $searchText);
        $features = Feature::query();
        // Combine conditions for all keywords
        $features->where(function ($query) use ($keywords) {
            foreach ($keywords as $keyword) {
                $keywordWithoutSpace = str_replace(' ', '', $keyword);
                $query->where(function ($subQuery) use ($keywordWithoutSpace) {
                    $subQuery->whereRaw("REPLACE(name, ' ', '') LIKE ?", ['%' . $keywordWithoutSpace . '%']);
                });
            }
        });
        $features = $features->orderBy('updated_at', 'desc')->paginate(10)->appends(['search' => $searchText]);
         return view('admin.features.index', ['features' => $features]);
    }
    
    public function create()
    {
        //
        return view('admin.features.create');
    }

    
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

   
    public function show(string $id)
    {
        //
    }

    
    public function edit(Feature $feature)
    {
        //
        return view('admin.features.edit', compact('feature'));
    }

    
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

    
    public function destroy(Feature $feature)
    {
        //
        if($feature->products->isNotEmpty()){
            $feature->products()->update(['feature_id'=>0]);
        }
        $feature->delete();

        return redirect()->route('admin.features.index')->with('success', 'Xóa Thiết kế thành công!');
    }
}