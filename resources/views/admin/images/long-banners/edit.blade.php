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
            Cập nhật Long Banners cho website..
        </div>
        <div class="card-body">
            <!--image-->
            <form method="post" action="{{route('admin.images.long-banners.update')}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row col-5 mb-4 ">
                   
                    <!--Long Banner 1 -->
                    <h6 class="text-dark mb-2">Long banner 1</h6>
                    <input type="file" style="display:none" name="image_link_banner1" id="image_link_banner1" onclick="previewImage_banner1()"
                        class="shadow form-control @error('image_link_banner1') is-invalid @enderror" />
                    <input type="text" id="image_link_check_banner1" style="display:none" name="image_link_check_banner1"
                        value="{{$longBanners->firstWhere('id', 5)->image_link}}">
                    <img id="previewImage_banner1" src="{{asset('/img/long-banner/' . $longBanners->firstWhere('id', 5)->image_link) }}" class="mt-2 img-thumbnail"
                        alt="Preview">
                    <a id="changeImage_banner1" class="text-danger mt-2" style="  cursor:pointer"
                        onclick="chooseAnotherImage_banner1()">Xóa
                        ảnh</a>
                    @error('image_link_banner1')
                    <span class="invalid-feedback" role="alert">
                        <strong>

                            <p class="text-dark">Phải có ảnh (.JPG, .JPEG, .PNG, .WEBP)!</p>
                        </strong>
                    </span>
                    @enderror

                    <!--Long Banner 2 -->
                    <h6 class="text-dark mb-2 mt-4">Long banner 2</h6>
                    <input type="file" style="display:none" name="image_link_banner2" id="image_link_banner2" onclick="previewImage_banner2()"
                        class="shadow form-control @error('image_link_banner2') is-invalid @enderror" />
                    <input type="text" id="image_link_check_banner2" style="display:none" name="image_link_check_banner2"
                        value="{{$longBanners->firstWhere('id', 6)->image_link}}">
                    <img id="previewImage_banner2" src="{{asset('/img/long-banner/' . $longBanners->firstWhere('id', 6)->image_link) }}" class="mt-2 img-thumbnail"
                        alt="Preview">
                    <a id="changeImage_banner2" class="text-danger mt-2" style=" cursor:pointer"
                        onclick="chooseAnotherImage_banner2()">Xóa
                        ảnh</a>
                    @error('image_link_banner2')
                    <span class="invalid-feedback" role="alert">
                        <strong>

                            <p class="text-dark">Phải có ảnh (.JPG, .JPEG, .PNG, .WEBP)!</p>
                        </strong>
                    </span>
                    @enderror

                    <!--Long Banner 3 -->
                    <h6 class="text-dark mb-2 mt-4">Long banner 3</h6>
                    <input type="file" style="display:none" name="image_link_banner3" id="image_link_banner3" onclick="previewImage_banner3()"
                        class="shadow form-control @error('image_link_banner3') is-invalid @enderror" />
                    <input type="text" id="image_link_check_banner3" style="display:none" name="image_link_check_banner3"
                        value="{{$longBanners->firstWhere('id', 7)->image_link}}">
                    <img id="previewImage_banner3" src="{{asset('/img/long-banner/' . $longBanners->firstWhere('id', 7)->image_link) }}" class="mt-2 img-thumbnail"
                        alt="Preview">
                    <a id="changeImage_banner3" class="text-danger mt-2" style=" cursor:pointer"
                        onclick="chooseAnotherImage_banner3()">Xóa
                        ảnh</a>
                    @error('image_link_banner3')
                    <span class="invalid-feedback" role="alert">
                        <strong>

                            <p class="text-dark">Phải có ảnh (.JPG, .JPEG, .PNG, .WEBP)!</p>
                        </strong>
                    </span>
                    @enderror

                    <!--Long Banner 4 -->
                    <h6 class="text-dark mb-2 mt-4">Long banner 4</h6>
                    <input type="file" style="display:none" name="image_link_banner4" id="image_link_banner4" onclick="previewImage_banner4()"
                        class="shadow form-control @error('image_link_banner4') is-invalid @enderror" />
                    <input type="text" id="image_link_check_banner4" style="display:none" name="image_link_check_banner4"
                        value="{{$longBanners->firstWhere('id', 8)->image_link}}">
                    <img id="previewImage_banner4" src="{{asset('/img/long-banner/' . $longBanners->firstWhere('id', 8)->image_link) }}" class="mt-2 img-thumbnail"
                        alt="Preview">
                    <a id="changeImage_banner4" class="text-danger mt-2" style=" cursor:pointer"
                        onclick="chooseAnotherImage_banner4()">Xóa
                        ảnh</a>
                    @error('image_link_banner4')
                    <span class="invalid-feedback" role="alert">
                        <strong>

                            <p class="text-dark">Phải có ảnh (.JPG, .JPEG, .PNG, .WEBP)!</p>
                        </strong>
                    </span>
                    @enderror
                </div>


                <div class="text-center">
                   
                    <input type="submit" class="btn btn-primary" value="Cập nhật" />
                    <a href="{{route('admin.images.index')}}" class="btn btn-secondary">Trở lại</a>
                </div>

            </form>
        </div>
    </div>
    <script src="{{asset('js/admin-preview-edit-long-banners.js')}}"></script>
    @endsection('content')