<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Catalog;
use App\Models\Type;
use App\Models\Brand;
use App\Models\Image;
use App\Models\Feature;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //HOME
     
    public function HomePageGetAll()
    {
        //
        $tivis = Product::where('catalog_id', 1)->orderBy('updated_at', 'desc')->limit(15)->get();
        $tulanhs = Product::where('catalog_id', 2)->orderBy('updated_at', 'desc')->limit(15)->get();
        $maygiats = Product::where('catalog_id', 3)->orderBy('updated_at', 'desc')->limit(15)->get();
        $dieuhoas = Product::where('catalog_id', 4)->orderBy('updated_at', 'desc')->limit(15)->get();
        return view('main.home', ['tivis' => $tivis,'tulanhs'=>$tulanhs, 'maygiats' => $maygiats,'dieuhoas' => $dieuhoas]);
    }
    public function show(Product $product)
    {
        //
        $tulanhs = Product::where('catalog_id', $product->catalog_id)->inRandomOrder()->limit(10)->get();
        return view('main.products.show', compact('product','tulanhs'));}
    public function HeaderSearch(Request $request)
    {
        $searchText = $request->input('search');
        $searchTextWithoutSpace = str_replace(' ', '', $searchText);
        $products = Product::whereRaw("REPLACE(name, ' ', '') LIKE '%" . $searchTextWithoutSpace . "%'")->orWhereRaw("REPLACE(model, ' ', '') LIKE '%" . $searchTextWithoutSpace . "%'")->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.products.index', ['products' => $products]);
    }

    //ADMIN
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
     * Display the specified resource.
     */
    

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
        $validator = $request->validate([
            'name' => 'required',
            'model' => 'required',
            'price' => 'required|numeric|max:999999999|min:500',
            'old_price' => 'nullable|max:999999999|numeric|min:500',
            'quantity' => 'required|numeric|min:0',
            'image_link' => 'required|file|mimes:jpeg,png,webp,jpg,svg|max:7168',
            'image_list.*' => 'file|mimes:jpeg,png,webp,jpg,svg|max:7168',
        ]);

        if (!$validator) {
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

        if (is_null($request->content)) {
            $product->content = "<p>Nội dung đang được cập nhật</p>";
        } else {
            $product->content = $request->content;
        }



        if (is_null($request->specifications)) {
            $product->specifications = "<p>Thông số đang được cập nhật</p>";
        } else {

            $product->specifications = $request->specifications;
        }


        $imageSaveLocation = public_path('img/product_images');

        $mainImage = $request->file('image_link');
        $mainImageName = time() . '_' . $product->model . '.' . $mainImage->getClientOriginalExtension();
        $mainImage->move($imageSaveLocation, $mainImageName);
        $product->image_link = $mainImageName;

        if ($request->has('image_list')) {
            $imageList = $request->file('image_list');
            $imageListNames = [];
            $count = 1;
            foreach ($imageList as $image) {
                $imageName = time() . '_' . $product->model . '_' . $count . '.' . $image->getClientOriginalExtension();
                $image->move($imageSaveLocation, $imageName);
                $imageListNames[] = $imageName;
                $count = $count + 1;
            }
            $imageListNamesJson = json_encode($imageListNames);
            $product->image_list = $imageListNamesJson;
        } else {
            $imageListNames = [];
            $product->image_list = json_encode($imageListNames);
        }

        $product->save();
        return redirect()->route('admin.products.index')->with('success', 'Thêm mới Sản phẩm thành công');
    }

    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        $catalogs = Catalog::all();
        $brands = Brand::all();
        $features = Feature::all();
        $types = Type::all();
        return view('admin.products.edit', compact(['product', 'catalogs', 'brands', 'features', 'types']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //

        $rules = [
            'name' => 'required',
            'model' => 'required',
            'price' => 'required|numeric|max:999999999|min:500',
            'old_price' => 'nullable|max:999999999|numeric|min:500',
            'quantity' => 'required|numeric|min:0',

        ];

        // Conditionally add 'image_link' rule
        $product = Product::find($request->hidden_id);
        if ($request->image_link_check != $product->image_link) {
            $rules['image_link'] = 'required|file|mimes:jpeg,png,webp,jpg,svg|max:7168';
        }
        if ($request->image_list_check != $product->image_list) {
            $rules['image_list.*'] = 'file|mimes:jpeg,png,webp,jpg,svg|max:7168';
        }

        $validator = $request->validate($rules);


        if (!$validator) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

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

        if (is_null($request->content)) {
            $product->content = "<p>Nội dung đang được cập nhật</p>";
        } else {
            $product->content = $request->content;
        }



        if (is_null($request->specifications)) {
            $product->specifications = "<p>Thông số đang được cập nhật</p>";
        } else {

            $product->specifications = $request->specifications;
        }


        $imageSaveLocation = public_path('img/product_images');

        if ($request->image_link_check != $product->image_link) {
            $mainImage = $request->file('image_link');
            $mainImageName = time() . '_' . $product->model . '.' . $mainImage->getClientOriginalExtension();
            $mainImage->move($imageSaveLocation, $mainImageName);
            $product->image_link = $mainImageName;
        } else {
            $product->image_link = $request->image_link_check;
        }
        //Xử lí image_list
        if ($request->image_list_check != $product->image_list) {
            if ($request->has('image_list')) {
                $imageList = $request->file('image_list');
                $imageListNames = [];
                $count = 1;
                foreach ($imageList as $image) {
                    $imageName = time() . '_' . $product->model . '_' . $count . '.' . $image->getClientOriginalExtension();
                    $image->move($imageSaveLocation, $imageName);
                    $imageListNames[] = $imageName;
                    $count = $count + 1;
                }
                $imageListNamesJson = json_encode($imageListNames);
                $product->image_list = $imageListNamesJson;
            } else {
                $imageListNames = [];
                $product->image_list = json_encode($imageListNames);
            }
        } else {
            $product->image_list = $request->image_list_check;
        }

        $product->save();
        // Chuyển hướng về trang san pham
        return redirect()->route('admin.products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Product $product)
    {
        return view('admin.products.delete', compact('product'));
    }
    public function destroy(Product $product)
    {
        //
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Xóa sản phẩm thành công!');
    }
}