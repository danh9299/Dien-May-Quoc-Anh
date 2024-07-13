@extends('admin.master')

@section('content')


<div class="row">
    <h3 class="mt-2 px-5">Thêm tin tức</h3>

    <div class="container mt-2 px-5  mb-2">
        <div class="card shadow">
            <div class="card-header ">
                Nhập thông tin tin tức mới..
            </div>
            <div class="card-body bg-secondary-subtle">
                <form method="post" action="{{ route('admin.articles.store')}}" enctype="multipart/form-data">
                    @csrf
                    <!--Tiêu đề-->
                    <div class="row mb-3">
                        <h6 class="text-dark col-sm-2 col-h6-form">Tiêu đề</h6>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{old('name')}}"
                                class="shadow @error('name') is-invalid @enderror form-control" />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>

                                    <p class="text-dark">Tiêu đề không được để trống!</p>
                                </strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!--Mô tả ngắn-->
                    <div class="row mb-3">
                        <h6 class="text-dark col-sm-2 col-h6-form">Mô tả ngắn</h6>
                        <div class="col-sm-10">
                            <textarea name="meta_description" maxlength="155"
                                class="form-control">{{old('meta_description')}}</textarea>
                        </div>
                    </div>
                    <!--Tác giả-->
                    <div class="row mb-4 ">
                        <h6 class="text-dark  mb-2">Tác giả</h6>
                        <input type="text" name="author_id" value="{{ Auth::guard('admin')->id()}}"
                            class="shadow  form-control" hidden />
                        <div class="col-sm-10">
                            <input type="text" name="" value="{{ Auth::guard('admin')->user()->name}}"
                                class="shadow  form-control" readonly />
                        </div>
                    </div>
                    <!--Ảnh-->
                    <div class="row col-5 mb-4 ">
                        <h6 class="text-dark mb-2">Ảnh đại diện</h6>
                        <div class="col-sm-10">
                            <input type="file" name="image_link" id="image_link" onclick="previewImage()"
                                class="shadow @error('image_link') is-invalid @enderror form-control" />
                        </div>
                        <img id="previewImage" class="mt-2 img-thumbnail" alt="Preview" style="display:none;">
                        <a id="changeImage" class="text-danger mt-2" style="max-width:200px; display:none"
                            onclick="chooseAnotherImage()">Xóa ảnh</a>
                        @error('image_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>
                                <p class="text-dark">Tin tức phải có ảnh đại diện (.JPG, .PNG, .JPEG, .WEBP)!</p>
                            </strong>
                        </span>
                        @enderror
                    </div>

                    <!--Mô tả sản phẩm-->
                    <div class="row mb-4 ">
                        <h6 class="text-dark  mb-2">Nội dung tin tức</h6>
                        <textarea name="content" id="contenteditor">{{old('content')}}</textarea>
                    </div>
                    <!--Thêm-->
                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" value="Thêm" />
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<script src="{{asset('js/admin-preview-image-create-articles.js')}}"></script>




@endsection('content')