<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Catalog;
use App\Models\Type;
use App\Models\Brand;
use App\Models\Image;
use App\Models\Feature;
use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;

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
        return view('main.home', ['tivis' => $tivis, 'tulanhs' => $tulanhs, 'maygiats' => $maygiats, 'dieuhoas' => $dieuhoas]);
    }

    public function listAllProducts(Request $request)
    {

        $filter_brands = Brand::all();
        $filter_types = Type::all();

        $filter_features = Feature::all();


        // Lấy các sản phẩm 

        $productsQuery = Product::query();

        // Lấy dữ liệu từ các bộ lọc (nếu có)
        $brandIds = $request->input('brands', []);
        $featureIds = $request->input('features', []);
        $typeIds = $request->input('types', []);

        if (!empty($brandIds)) {
            $productsQuery->whereIn('brand_id', $brandIds);
        }

        if (!empty($featureIds)) {
            $productsQuery->whereIn('feature_id', $featureIds);
        }

        if (!empty($typeIds)) {
            $productsQuery->whereIn('type_id', $typeIds);
        }
        // Lọc theo giá
        if ($request->has('min_price') && $request->min_price !== null) {
            $productsQuery->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price') && $request->max_price !== null) {
            $productsQuery->where('price', '<=', $request->max_price);
        }
        // Sử dụng truy vấn đã áp dụng bộ lọc để phân trang và lấy sản phẩm
        // Order by updated_at in descending order
        $productsQuery->orderBy('updated_at', 'desc');

        // Paginate the results
        $products = $productsQuery->paginate(10);
        return view('main.products.list-all-products', compact('products', 'filter_brands', 'filter_types', 'filter_features'));
    }
    public function listNoBrand(Catalog $catalog, Request $request)
    {

        $filter_brands = Brand::whereHas('products', function ($query) use ($catalog) {
            $query->where('catalog_id', $catalog->id);
        })->get();
        $filter_types = Type::whereHas('products', function ($query) use ($catalog) {
            $query->where('catalog_id', $catalog->id);
        })->get();
        $filter_features = Feature::whereHas('products', function ($query) use ($catalog) {
            $query->where('catalog_id', $catalog->id);
        })->get();


        // Lấy các sản phẩm dựa trên các bộ lọc
        $productsQuery = Product::where('catalog_id', $catalog->id);

        // Lấy dữ liệu từ các bộ lọc (nếu có)
        $brandIds = $request->input('brands', []);
        $featureIds = $request->input('features', []);
        $typeIds = $request->input('types', []);

        if (!empty($brandIds)) {
            $productsQuery->whereIn('brand_id', $brandIds);
        }

        if (!empty($featureIds)) {
            $productsQuery->whereIn('feature_id', $featureIds);
        }

        if (!empty($typeIds)) {
            $productsQuery->whereIn('type_id', $typeIds);
        }
        // Lọc theo giá
        if ($request->has('min_price') && $request->min_price !== null) {
            $productsQuery->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price') && $request->max_price !== null) {
            $productsQuery->where('price', '<=', $request->max_price);
        }
        // Sử dụng truy vấn đã áp dụng bộ lọc để phân trang và lấy sản phẩm
        $products = $productsQuery->orderBy('updated_at', 'desc')->paginate(10);
        return view('main.products.list-no-brand', compact('products', 'catalog', 'filter_brands', 'filter_types', 'filter_features'));
    }
    public function listWithBrand($catalog_id, $brand_id, Request $request)
    {


        // Fetch the catalog object if needed
        $catalog = Catalog::findOrFail($catalog_id);
        $brand = Brand::findOrFail($brand_id);
        $filter_types = Type::whereHas('products', function ($query) use ($catalog) {
            $query->where('catalog_id', $catalog->id);
        })->get();
        $filter_features = Feature::whereHas('products', function ($query) use ($catalog) {
            $query->where('catalog_id', $catalog->id);
        })->get();

        // Lấy các sản phẩm dựa trên các bộ lọc
        $productsQuery = Product::where('catalog_id', $catalog->id)->where('brand_id', $brand_id);

        // Lấy dữ liệu từ các bộ lọc (nếu có)

        $featureIds = $request->input('features', []);
        $typeIds = $request->input('types', []);
        if (!empty($featureIds)) {
            $productsQuery->whereIn('feature_id', $featureIds);
        }

        if (!empty($typeIds)) {
            $productsQuery->whereIn('type_id', $typeIds);
        }

        // Lọc theo giá
        if ($request->has('min_price') && $request->min_price !== null) {
            $productsQuery->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price') && $request->max_price !== null) {
            $productsQuery->where('price', '<=', $request->max_price);
        }
        // Sử dụng truy vấn đã áp dụng bộ lọc để phân trang và lấy sản phẩm
        $products = $productsQuery->orderBy('updated_at', 'desc')->paginate(10);


        return view('main.products.list-with-brand', compact('brand', 'products', 'catalog', 'filter_types', 'filter_features'));
    }
    public function show(Product $product)
    {
        //
        $similar_products = Product::where('catalog_id', $product->catalog_id)->inRandomOrder()->limit(10)->get();
        return view('main.products.show', compact('product', 'similar_products'));
    }
    public function headerSearch(Request $request)
    {
        $searchText = $request->input('search');
        $keywords = explode(' ', $searchText);
        $products = Product::query();
        // Combine conditions for all keywords
        $products->where(function ($query) use ($keywords) {
            foreach ($keywords as $keyword) {
                $keywordWithoutSpace = str_replace(' ', '', $keyword);
                $query->where(function ($subQuery) use ($keywordWithoutSpace) {
                    $subQuery->whereRaw("REPLACE(name, ' ', '') LIKE ?", ['%' . $keywordWithoutSpace . '%'])
                        ->orWhereRaw("REPLACE(model, ' ', '') LIKE ?", ['%' . $keywordWithoutSpace . '%']);
                });
            }
        });

        $products = $products->orderBy('updated_at', 'desc')->paginate(10)->appends(['search' => $searchText]);

        return view('main.products.search', ['products' => $products]);

    }

    //ADMIN
    public function index()
    {
        //
        $products = Product::orderBy('updated_at', 'desc')->paginate(10);
        return view('admin.products.index', ['products' => $products]);
    }
    public function search(Request $request)
    {
        $searchText = $request->input('search');
        $keywords = explode(' ', $searchText);
        $products = Product::query();
        // Combine conditions for all keywords
        $products->where(function ($query) use ($keywords) {
            foreach ($keywords as $keyword) {
                $keywordWithoutSpace = str_replace(' ', '', $keyword);
                $query->where(function ($subQuery) use ($keywordWithoutSpace) {
                    $subQuery->whereRaw("REPLACE(name, ' ', '') LIKE ?", ['%' . $keywordWithoutSpace . '%'])
                        ->orWhereRaw("REPLACE(model, ' ', '') LIKE ?", ['%' . $keywordWithoutSpace . '%']);
                });
            }
        });
        $products = $products->orderBy('updated_at', 'desc')->paginate(10)->appends(['search' => $searchText]);
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
        $imageSaveUrl = 'img/product_images';

        $mainImage = $request->file('image_link');
        $mainImageName = time() . '_' . $product->model ;
        $mainImageName = preg_replace('/[^A-Za-z0-9]/', '', $mainImageName). '.' . $mainImage->getClientOriginalExtension();
        $mainImage->move($imageSaveLocation, $mainImageName);
        $product->image_link = $imageSaveUrl . '/' . $mainImageName;

        if ($request->has('image_list')) {
            $imageList = $request->file('image_list');
            $imageListNames = [];
            $count = 1;
            foreach ($imageList as $image) {
                $imageName = time() . '_' . $product->model . '_' . $count ;
                $imageName = preg_replace('/[^A-Za-z0-9]/', '', $imageName). '.' . $image->getClientOriginalExtension();
                $image->move($imageSaveLocation, $imageName);
                $imageListNames[] = $imageSaveUrl . '/' . $imageName;
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
        $imageSaveUrl = 'img/product_images';

        if ($request->image_link_check != $product->image_link) {
            $mainImage = $request->file('image_link');
            $mainImageName = time() . '_' . $product->model ;
            $mainImageName = preg_replace('/[^A-Za-z0-9]/', '', $mainImageName). '.' . $mainImage->getClientOriginalExtension();
            $mainImage->move($imageSaveLocation, $mainImageName);
            $product->image_link = $imageSaveUrl . '/' . $mainImageName;
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
                    $imageName = time() . '_' . $product->model . '_' . $count ;
                    $imageName = preg_replace('/[^A-Za-z0-9]/', '', $imageName). '.' . $image->getClientOriginalExtension();
                    $image->move($imageSaveLocation, $imageName);
                    $imageListNames[] = $imageSaveUrl . '/' . $imageName;
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


    public function quickEdit($id)
    {

        $product = Product::findOrFail($id);
        return response()->json($product);
    }
    public function quickUpdate(Request $request, $id)
    {



        $product = Product::findOrFail($id);
        // Cập nhật thông tin sản phẩm
        $product->name = $request->name;
        $product->price = $request->price;
        $product->model = $request->model;
        $product->save();

        return response()->json(['message' => 'Cập nhật thành công!']);
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
    public function export()
    {
        return Excel::download(new ProductsExport, 'dienmayquocanh-tat-ca-san-pham.xlsx');
    }
    public function formImport()
    {
        return view('admin.products.form-import');
    }

    public function import(Request $request)
    {
        try {
            if ($request->hasFile('file')) {
                

                $file = $request->file('file');
                
                // Đặt tên mới cho file
                $fileName = time() . '_' . $file->getClientOriginalName();
               
                // Di chuyển file vào thư mục lưu trữ (nếu muốn)
                $file->move(public_path('import-products'), $fileName);

                // Thực hiện import với tên file mới
                Excel::import(new ProductsImport, public_path('import-products/' . $fileName));
                // Xóa file sau khi import
                unlink(public_path('import-products/' . $fileName));



                return redirect()->route('admin.products.index')->with('success', 'Import thành công!');


            } else {
                return redirect()->back()->with('error', 'Không có file được gửi lên!');
            }
        
    } catch (\Exception $e) {
         //Nếu có ngoại lệ, chuyển hướng người dùng đến trang form import kèm thông báo lỗi
        return redirect()->back()->with('error', 'Có lỗi xảy ra trong quá trình import. Hãy kiểm tra lại định dạng file hoặc các trường dữ liệu trong file nhập của bạn! ');
    }
    }

}