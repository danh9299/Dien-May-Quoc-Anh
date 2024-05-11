@extends('admin.master')

@section('content')


<div class="row">
    <h3 class="mt-2 px-5">Xóa sản phẩm</h3>

    <div class="container mt-2 px-5  mb-2">
        <div class="card shadow">
            <div class="card-header">
                Xóa sản phẩm {{$product->name}}..
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.products.destroy',$product->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('delete')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Ảnh sản phẩm</label>
                        <div class="col-sm-10">
                        <img src="{{ asset('/img/product_images/' . $product->image_link) }}"
                                class="admin-product-image" alt="{{$product->model}}" readonly/>
                        </div>
                    </div>
                   
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Model sản phẩm</label>
                        <div class="col-sm-10">
                            <input type="text" name="model" value="{{$product->model}}" class="shadow form-control" readonly />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Tên sản phẩm</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{$product->name}}" class="shadow form-control"
                                readonly />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Hãng</label>
                        <div class="col-sm-10">
                            <input type="text" name="brand_id" value="{{$product->brand->name}}" class="shadow form-control"
                                readonly />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Danh mục</label>
                        <div class="col-sm-10">
                            <input type="text" name="catalog_id" value="{{$product->catalog->catalog_name}}" class="shadow form-control"
                                readonly />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Phân loại</label>
                        <div class="col-sm-10">
                            <input type="text" name="type_id" value="{{$product->type->name}}" class="shadow form-control"
                                readonly />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Thiết kế</label>
                        <div class="col-sm-10">
                            <input type="text" name="feature_id" value="{{$product->feature->name}}" class="shadow form-control"
                                readonly />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Giá sản phẩm</label>
                        <div class="col-sm-10">
                            <input type="text" name="price" value="{{$product->price}}" class="shadow form-control"
                                readonly />
                        </div>
                    </div>


                    <p>Bạn muốn xóa sản phẩm này chứ?</p>
                    <button product="submit" class="btn btn-danger">Có</button>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Không</a>
                </form>
            </div>
        </div>

    </div>
</div>






@endsection('content')