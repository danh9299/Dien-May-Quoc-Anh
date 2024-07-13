@extends('admin.master')

@section('content')


<div class="row">
    <h3 class="mt-2 px-5">Sửa tin tức</h3>

    <div class="container mt-2 px-5  mb-2">
        <div class="card shadow">
            <div class="card-header ">
                Sửa tin tức
            </div>
            <div class="card-body bg-secondary-subtle">
                <form method="post" action="{{ route('admin.articles.update',$article->id)}}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!--Tên sản phẩm-->
                    <div class="row mb-3">
                        <h6 class="text-dark col-sm-2 col-h6-form">Tiêu đề</h6>
                        <div class="col-sm-10">
                            <input type="text" name="name"
                                value="@if($errors->any()) {{old('name')}} @else {{$article->name}} @endif"
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
                                class="form-control">@if($errors->any()) {{old("meta_description")}} @else {{$article->meta_description}} @endif</textarea>
                        </div>
                    </div>
                    <!--Tác giả-->
                    <div class="row mb-4 ">
                        <h6 class="text-dark  mb-2">Tác giả</h6>
                        <input type="text" name="author_id" value="{{$article->admin->id}}" class="shadow  form-control"
                            hidden />
                        <div class="col-sm-10">
                            <input type="text" name="" value="{{ $article->admin->name}}" class="shadow  form-control"
                                readonly />
                        </div>
                    </div>
                    <!--Ảnh-->
                    <div class="row col-5 mb-4 ">
                        <h6 class="text-dark mb-2">Ảnh đại diện</h6>
                        <input type="file" style="display:none" name="image_link" id="image_link"
                            onclick="previewImage()"
                            class="shadow @error('image_link') is-invalid @enderror form-control" />
                        <input type="text" id="image_link_check" style="display:none" name="image_link_check"
                            value="{{$article->image_link}}">
                        <img id="previewImage" src="{{asset( $article->image_link) }}" class="mt-2 img-thumbnail"
                            alt="Preview">
                        <a id="changeImage" class="text-danger mt-2" style="max-width:200px; "
                            onclick="chooseAnotherImage()">Xóa ảnh</a>
                        @error('image_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>

                                <p class="text-dark">Tin tức phải có ảnh đại diện (.JPG, .JPEG, .PNG, .WEBP)!</p>
                            </strong>
                        </span>
                        @enderror
                    </div>
                    <!--Nội dung-->
                    <div class="row mb-4 ">
                        <h6 class="text-dark  mb-2">Nội dung tin tức</h6>
                        <textarea name="content" class="product-content-editor"
                            id="contenteditor">@if($errors->any()) {{old('content')}} @else {{$article->content}} @endif</textarea>
                    </div>
                    <div class="text-center">
                        <input type="hidden" name="hidden_id" value="{{ $article->id }}" />
                        <input type="submit" class="btn btn-primary" value="Cập nhật" />
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

<script src="{{asset('js/admin-preview-image-edit-articles.js')}}"></script>




@endsection('content')