<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Catalog;
use App\Models\Type;
use App\Models\Brand;
use App\Models\Feature;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.products.index', ['products' => $products]);
    }
    public function search(Request $request)
    {
        $searchText = $request->input('search');
        $searchTextWithoutSpace = str_replace(' ', '', $searchText);
        $products = Product::whereRaw("REPLACE(name, ' ', '') LIKE '%" . $searchTextWithoutSpace . "%'")->orWhereRaw("REPLACE(model, ' ', '') LIKE '%" . $searchTextWithoutSpace . "%'")->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $catalogs = Catalog::all();
        $brands = Brand::all();
        $features = Feature::all();
        $types = Type::all();

        return view('admin.products.create', ['catalogs' => $catalogs, 'brands' => $brands, 'features' => $features, 'types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator =  $request->validate([
            'name' => 'required',
            'model' => 'required',
            'price' => 'required|numeric|max:999999999|min:500',
            'old_price' => 'nullable|max:999999999|numeric|min:500',
            'quantity' => 'required|numeric|min:0',
            'image_link' => 'required|file|mimes:jpeg,png,webp,jpg,svg|max:7168',
            'image_list.*' => 'file|mimes:jpeg,png,webp,jpg,svg|max:7168',
        ]);

        if (!$validator){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = new Product;
        $product->name = $request->name;
        $product->model = $request->model;
        $product->price = $request->price;
        if (is_null($request->old_price)) {
            $product->old_price = $request->price;
        } else {
            $product->old_price = $request->old_price;
            
        }
        $product->quantity = $request->quantity;
        $product->brand_id = $request->brand_id;
        $product->feature_id = $request->feature_id;
        $product->type_id = $request->type_id;
        $product->catalog_id = $request->catalog_id;
        if ($request->has('content')) {
            if (is_null($request->content)) {
                $product->content = "<p>Nội dung đang được cập nhật</p>";
            } else {
                $product->content = $request->content;
            }
        } else {
            $product->content = "<p>Nội dung đang được cập nhật</p>";
        }

        if ($request->has('specifications')) {
            if (is_null($request->specifications)) {
                $product->specifications = "<p>Thông số đang được cập nhật</p>";
            } else {

                $product->specifications = $request->specifications;
            }
        } else {
            $product->specifications = "<p>Thông số đang được cập nhật</p>";
        }

        $imageSaveLocation = public_path('img/product_images');

        $mainImage = $request->file('image_link');
        $mainImageName = time() . '_' . $product->model.'.'.$mainImage->getClientOriginalExtension();
        $mainImage->move($imageSaveLocation, $mainImageName);
        $product->image_link = $mainImageName;

        if ($request->has('image_list')) {
            $imageList = $request->file('image_list');
            $imageListNames = [];
            $count=1;
            foreach ($imageList as $image) {
                $imageName = time() . '_' . $product->model.'_'.$count.'.'.$image->getClientOriginalExtension();
                $image->move($imageSaveLocation, $imageName);
                $imageListNames[] = $imageName;
                $count = $count +1;
            }
            $imageListNamesJson = json_encode($imageListNames);
            $product->image_list = $imageListNamesJson;
        } else {
            $product->image_list = "";
        }

        $product->save();
        return redirect()->route('admin.products.index')->with('success', 'Thêm mới Sản phẩm thành công');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}