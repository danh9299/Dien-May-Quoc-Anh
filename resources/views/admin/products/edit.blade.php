@extends('admin.master')

@section('content')


<div class="row">
    <h3 class="mt-2 px-5">Sửa sản phẩm</h3>

    <div class="container mt-2 px-5  mb-2">
        <div class="card shadow">
            <div class="card-header ">
                Sửa thông tin sản phẩm {{$product->name}}
            </div>
            <div class="card-body bg-secondary-subtle">
                <form method="post" action="{{ route('admin.products.update',$product->id)}}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!--Tên sản phẩm-->
                    <div class="row mb-3">
                        <h6 class="text-dark col-sm-2 col-h6-form">Tên sản phẩm</h6>
                        <div class="col-sm-10">
                            <input type="text" name="name"
                                value="@if($errors->any()) {{old('name')}} @else {{$product->name}} @endif"
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
                                <option value="{{$brand->id}}" @if($errors->any())
                                    {{old('brand_id') == $brand->id ? 'selected' : ''}} @else
                                    {{$product->brand_id == $brand->id ? 'selected' : '' }} @endif >{{$brand->name}}
                                </option>
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
                                <option value="{{$catalog->id}}" @if($errors->any())
                                    {{old('catalog_id') == $catalog->id ? 'selected' : '' }} @else
                                    {{$product->catalog_id == $catalog->id ? 'selected' : '' }}
                                    @endif >{{$catalog->catalog_name}}</option>
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
                                <option value="{{$feature->id}}" @if($errors->any())
                                    {{ old('feature_id') == $feature->id ? 'selected' : '' }} @else
                                    {{ $product->feature_id == $feature->id ? 'selected' : '' }}
                                    @endif>{{$feature->name}}</option>
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
                                <option value="{{$type->id}}" @if($errors->any())
                                    {{ old('type_id') == $type->id ? 'selected' : '' }} @else
                                    {{ $product->type_id == $type->id ? 'selected' : '' }} @endif >{{$type->name}}
                                </option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>


                    <!--Model sản phẩm-->
                    <div class="row mb-4">
                        <h6 class="text-dark col-sm-2">Model</h6>
                        <div class="col-sm-10">
                            <input type="text" name="model" value="@if($errors->any()) {{old("model")}} @else {{$product->model}} @endif" class="shadow @error('model') is-invalid @enderror form-control" />
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
                                <input  name="old_price" value="@if($errors->any()) {{old('old_price') }} @else {{ $product->old_price}} @endif"
                                    class="shadow @error('old_price') is-invalid @enderror form-control" />
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
                                <input  name="price" value="@if($errors->any()) {{old('price')}} @else {{$product->price}} @endif"
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

                    <!--Số lượng-->
                    <div class="row mb-4">
                        <h6 class="text-dark col-sm-2">Số lượng tồn kho</h6>
                        <div class="col-sm-3">
                            <input  name="quantity" value="@if($errors->any()) {{old('quantity')}} @else {{$product->quantity}} @endif"
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
                        <textarea name="content" class="product-content-editor"
                            id="contenteditor">@if($errors->any()) {{old('content')}} @else {{$product->content}} @endif</textarea>
                    </div>


                    <!--specifications-->
                    <div class="row mb-4 ">
                        <h6 class="text-dark mb-2">Thông số kỹ thuật</h6>
                        <textarea name="specifications" class="product-specs-editor"
                            id="contenteditor">@if($errors->any()) {{old('specifications')}} @else {{$product->specifications}} @endif</textarea>
                    </div>



                    <!--image-->
                    <div class="row col-5 mb-4 ">
                        <h6 class="text-dark mb-2">Ảnh đại diện sản phẩm</h6>
                        <input type="file" style="display:none" name="image_link" id="image_link" onclick="previewImage()"
                            class="shadow @error('image_link') is-invalid @enderror form-control" />
                        <input type="text" id="image_link_check" style="display:none" name="image_link_check"
                            value="{{$product->image_link}}">
                        <img id="previewImage" src="{{asset($product->image_link) }}"
                            class="mt-2 admin-product-image" alt="Preview">
                        <a id="changeImage" class="text-danger mt-2" style="max-width:200px; "
                            onclick="chooseAnotherImage()">Xóa ảnh</a>
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
                        <input style="@if($product->image_list != "[]")  display:none @endif" type="file" multiple name="image_list[]" id="image_list"
                            class="shadow @error('image_list.*') is-invalid @enderror  form-control" />
                            <input style="display:none"  value="{{$product->image_list}}" name="image_list_check" id="image_list_check"/>

                        <div class="mt-2" id="imagePreviewContainer">
                            @for ($i=0;$i<count(json_decode($product->image_list));$i = $i + 1)
                                <img class="admin-product-image"
                                    src="{{asset(json_decode($product->image_list)[$i]) }}">
                                @endfor
                        </div>
                       
                        <a id="changeImages"  @if($product->image_list == "[]") style="display:none"  @endif class="text-danger mt-2" style="max-width:200px;"
                            onclick="chooseOtherImages()">Xóa các ảnh</a>
                       
                        @error('image_list.*')
                        <span class="invalid-feedback" role="alert">
                            <strong>

                                <p class="text-dark">Vui lòng nhập các ảnh hợp lệ!</p>
                            </strong>
                        </span>
                        @enderror
                        @error('image_list')
                        <span class="invalid-feedback" role="alert">
                            <strong>

                                <p class="text-dark">Vui lòng tải lên các ảnh minh họa!</p>
                            </strong>
                        </span>
                        @enderror
                    </div>

                    <div class="text-center">
                        <input type="hidden" name="hidden_id" value="{{ $product->id }}" />
                        <input type="submit" class="btn btn-primary" value="Cập nhật" />
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

<script src="{{asset('js/admin-preview-image-edit-products.js')}}"></script>




@endsection('content')