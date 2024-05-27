@extends('admin.master')

@section('content')
<div class="row">

    <h3 class="mt-2 px-5">Quản lý hình ảnh</h3>


</div>
<div class="mt-2 mb-2 px-5 container">
    @if($message = Session::get('success'))

    <div class="mt-5 alert alert-success">
        {{ $message }}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            Cập nhật Logo cho website..
        </div>
        <div class="card-body">
            <!--image-->
            <form method="post" action="{{route('admin.images.logo.update')}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row col-5 mb-4 ">
                    <h6 class="text-dark mb-2">Logo</h6>
                    <input type="file" style="display:none" name="image_link" id="image_link" onclick="previewImage()"
                        class="shadow form-control @error('image_link') is-invalid @enderror" />
                    <input type="text" id="image_link_check" style="display:none" name="image_link_check"
                        value="{{$logo->image_link}}">
                    <img id="previewImage" src="{{asset('/img/logo/' . $logo->image_link) }}" class="mt-2 img-thumbnail"
                        alt="Preview">
                    <a id="changeImage" class="text-danger mt-2" style="max-width:200px; "
                        onclick="chooseAnotherImage()">Xóa
                        ảnh</a>
                    @error('image_link')
                    <span class="invalid-feedback" role="alert">
                        <strong>

                            <p class="text-dark">Phải có Logo (.JPG, .JPEG, .PNG, .WEBP)!</p>
                        </strong>
                    </span>
                    @enderror
                </div>


                <div class="text-center">
                    <input type="hidden" name="hidden_id" value="{{ $logo->id }}" />
                    <input type="submit" class="btn btn-primary" value="Cập nhật" />
                    <a href="{{route('admin.images.index')}}" class="btn btn-secondary">Trở lại</a>
                </div>

            </form>
        </div>
    </div>
    <script src="{{asset('js/admin-preview-edit-logo.js')}}"></script>
    @endsection('content')