@extends('admin.master')

@section('content')


<div class="row">
    <h3 class="mt-2 px-5">Thêm sản phẩm</h3>

    <div class="container mt-2 px-5  mb-2">
        <div class="card shadow">
            <div class="card-header ">
                Nhập thông tin sản phẩm mới..
            </div>
            <div class="card-body ">
                <form method="post" action="{{ route('admin.products.store')}}" enctype="multipart/form-data">
                    @csrf
                    <!--Tên sản phẩm-->
                    <div class="row mb-3">
                        <h6 class="text-dark col-sm-2 col-h6-form">Tên sản phẩm</h6>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="shadow @error('name') is-invalid @enderror form-control" />
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
                            <select name="catalog_id" class="shadow form-select">
                                @if(!empty($catalogs) && count($catalogs)>0)
                                @foreach($catalogs as $catalog)
                                <option value="{{$catalog->id}}">{{$catalog->catalog_name}}</option>
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
                                <option value="{{$catalog->id}}">{{$catalog->catalog_name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <!--Phân loại-->
                    <div class="row mb-4">
                        <h6 class="text-dark col-sm-2">Chọn phân loại</h6>
                        <div class="col-sm-10">
                            <select name="catalog_id" class="shadow form-select">
                                @if(!empty($catalogs) && count($catalogs)>0)
                                @foreach($catalogs as $catalog)
                                <option value="{{$catalog->id}}">{{$catalog->catalog_name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <!--Tính năng-->
                    <div class="row mb-4">
                        <h6 class="text-dark col-sm-2">Chọn tính năng</h6>
                        <div class="col-sm-10">
                            <select name="catalog_id" class="shadow form-select">
                                @if(!empty($catalogs) && count($catalogs)>0)
                                @foreach($catalogs as $catalog)
                                <option value="{{$catalog->id}}">{{$catalog->catalog_name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>


                    <!--Model sản phẩm-->
                    <div class="row mb-4">
                        <h6 class="text-dark col-sm-2">Model</h6>
                        <div class="col-sm-10">
                            <input type="text" name="model" class="shadow @error('model') is-invalid @enderror form-control" />
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
                                <input type="number" name="old_price" class="shadow form-control" />
                            </div>
                        </div>
                        <div class="col-4">
                            <h6 class="text-dark"> Giá bán</h6>
                            <div>
                                <input type="number" name="price" class="shadow form-control" />
                            </div>
                        </div>
                    </div>

                    <!--Số lượng-->
                    <div class="row mb-4">
                        <h6 class="text-dark col-sm-2">Số lượng</h6>
                        <div class="col-sm-1">
                            <input type="number" name="quantity" class="shadow form-control" />
                        </div>
                    </div>

                    <!--content-->
                    <div class="row mb-4 ">
                        <h6 class="text-dark  mb-2">Nội dung sản phẩm</h6>
                        <textarea name="content"  id="contenteditor"></textarea>
                    </div>


                    <!--specifications-->
                    <div class="row mb-4 ">
                        <h6 class="text-dark mb-2">Thông số kỹ thuật</h6>
                        <textarea name="specifications"  id="contenteditor"></textarea>
                    </div>



                    <!--image-->
                    <div class="row col-5 mb-4 ">
                        <h6 class="text-dark mb-2">Ảnh đại diện sản phẩm</h6>
                        <input type="file" name="image_link" class="shadow form-control" required />
                    </div>

                    <!--image list-->
                    <div class="row col-5 mb-4 ">
                        <h6 class="text-dark mb-2">Các ảnh minh họa sản phẩm</h6>
                        <input type="file" multiple name="image_list" class="shadow form-control" />
                    </div>





                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" value="Thêm" />
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>






@endsection('content')