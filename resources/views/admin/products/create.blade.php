@extends('admin.master')

@section('content')


<div class="row">
    <h3 class="mt-2 px-5">Thêm sản phẩm</h3>

    <div class="container mt-2 px-5  mb-2">
        <div class="card shadow">
            <div class="card-header ">
                Nhập thông tin sản phẩm mới..
            </div>
            <div class="card-body bg-secondary-subtle">
                <form method="post" action="{{ route('admin.products.store')}}" enctype="multipart/form-data">
                    @csrf
                    <!--Tên sản phẩm-->
                    <div class="row mb-3">
                        <h6 class="text-dark col-sm-2 col-h6-form">Tên sản phẩm</h6>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{old('name')}}"
                                class="shadow @error('name') is-invalid @enderror form-control" />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>

                                    <p class="text-dark">Tên sản phẩm không được để trống!</p>
                                </strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <!--Hãng-->
                        <h6 class="text-dark col-sm-2">Chọn hãng</h6>
                        <div class="col-sm-10">
                            <select name="brand_id" class="shadow form-select">
                                @if(!empty($brands) && count($brands)>0)
                                @foreach($brands as $brand)
                                <option value="{{$brand->id}}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{$brand->name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <!--Danh mục-->
                    <div class="row mb-4">
                        <h6 class="text-dark col-sm-2">Chọn danh mục</h6>
                        <div class="col-sm-10">
                            <select name="catalog_id" class="shadow form-select">
                                @if(!empty($catalogs) && count($catalogs)>0)
                                @foreach($catalogs as $catalog)
                                <option value="{{$catalog->id}}" {{old('catalog_id') == $catalog->id ? 'selected' : '' }}>{{$catalog->catalog_name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <!--Phân loại-->
                    <div class="row mb-4">
                        <h6 class="text-dark col-sm-2">Chọn thiết kế</h6>
                        <div class="col-sm-10">
                            <select name="feature_id" class="shadow form-select">
                                @if(!empty($features) && count($features)>0)
                                @foreach($features as $feature)
                                <option value="{{$feature->id}}" {{ old('feature_id') == $feature->id ? 'selected' : '' }} >{{$feature->name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <!--Tính năng-->
                    <div class="row mb-4">
                        <h6 class="text-dark col-sm-2">Chọn phân loại</h6>
                        <div class="col-sm-10">
                            <select name="type_id" class="shadow form-select">
                                @if(!empty($types) && count($types)>0)
                                @foreach($types as $type)
                                <option value="{{$type->id}}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{$type->name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>


                    <!--Model sản phẩm-->
                    <div class="row mb-4">
                        <h6 class="text-dark col-sm-2">Model</h6>
                        <div class="col-sm-10">
                            <input type="text" name="model" value="{{old('model')}}"
                                class="shadow @error('model') is-invalid @enderror form-control" />
                            @error('model')
                            <span class="invalid-feedback" role="alert">
                                <strong>

                                    <p class="text-dark">Model không được để trống!</p>
                                </strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!--Giá-->
                    <div class="row mb-4">
                        <div class="col-4">
                            <h6 class="text-dark">Giá cũ</h6>
                            <div>
                                <input  name="old_price" value="{{old('old_price')}}" class="shadow @error('old_price') is-invalid @enderror form-control" />
                                @error('old_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        <p class="text-dark">Vui lòng nhập giá hợp lệ!</p>
                                    </strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <h6 class="text-dark"> Giá bán</h6>
                            <div>
                                <input  name="price" value="{{old('price')}}"
                                    class="shadow @error('price') is-invalid @enderror form-control" />
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        <p class="text-dark">Vui lòng nhập giá hợp lệ!</p>
                                    </strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!--Nhập-->
                    <div class="row mb-4">
                        <h6 class="text-dark col-sm-2">Giá nhập kho</h6>
                        <div class="col-sm-3">
                            <input  name="import_price" value="{{old('import_price')}}"
                                class="shadow @error('import_price') is-invalid @enderror form-control" />
                            @error('import_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>

                                    <p class="text-dark">Vui lòng nhập giá hợp lệ!</p>
                                </strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!--Số lượng-->
                    <div class="row mb-4">
                        <h6 class="text-dark col-sm-2">Số lượng tồn kho</h6>
                        <div class="col-sm-3">
                            <input  name="quantity" value="{{old('quantity')}}"
                                class="shadow @error('quantity') is-invalid @enderror form-control" />
                            @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>

                                    <p class="text-dark">Vui lòng nhập số lượng hợp lệ!</p>
                                </strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!--content-->
                    <div class="row mb-4 ">
                        <h6 class="text-dark  mb-2">Nội dung sản phẩm</h6>
                        <textarea name="content" class="product-content-editor" id="contenteditor">{{old('content')}}</textarea>
                    </div>


                    <!--specifications-->
                    <div class="row mb-4 ">
                        <h6 class="text-dark mb-2">Thông số kỹ thuật</h6>
                        <textarea name="specifications" class="product-specs-editor" id="contenteditor">{{old('specifications')}}</textarea>
                    </div>



                    <!--image-->
                    <div class="row col-5 mb-4 ">
                        <h6 class="text-dark mb-2">Ảnh đại diện sản phẩm</h6>
                        <input type="file" name="image_link" id="image_link" onclick="previewImage()" class="shadow @error('image_link') is-invalid @enderror form-control" />
                        <img id="previewImage"  class="mt-2 admin-product-image" alt="Preview" style="display:none;">
                        <a id="changeImage" class="text-danger mt-2" style="max-width:200px; display:none" onclick="chooseAnotherImage()">Xóa ảnh</a>
                        @error('image_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>

                                    <p class="text-dark">Sản phẩm phải có ảnh đại diện (.JPG, .PNG, .WEBP)!</p>
                                </strong>
                            </span>
                            @enderror
                    </div>

                    <!--image list-->
                    <div class="row col-5 mb-4 ">
                        <h6 class="text-dark mb-2">Các ảnh minh họa sản phẩm</h6>
                        <input type="file" multiple name="image_list[]" id="image_list"  class="shadow @error('image_list.*') is-invalid @enderror  form-control" />
                       
                        <div class="mt-2" id="imagePreviewContainer"></div>
                        <a id="changeImages" class="text-danger mt-2" style="max-width:200px; display:none" onclick="chooseOtherImages()">Xóa các ảnh</a>
                        
                        @error('image_list.*')
                            <span class="invalid-feedback" role="alert">
                                <strong>

                                    <p class="text-dark">Vui lòng nhập các ảnh hợp lệ!</p>
                                </strong>
                            </span>
                            @enderror
                         
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" value="Thêm" />
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<script src="{{asset('js/admin-preview-image-create-products.js')}}"></script>




@endsection('content')