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
            Cập nhật Slider Banners cho website..
        </div>
        <div class="card-body">
            <!--image-->
            <form method="post" action="{{route('admin.images.slider-banners.update')}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row col-5 mb-4 ">

                    <!--Slider 1 -->
                    <h6 class="text-dark mb-2">Slider 1</h6>
                    <input type="file" style="display:none" name="image_link_banner1" id="image_link_banner1"
                        onclick="previewImage_banner1()"
                        class="shadow form-control @error('image_link_banner1') is-invalid @enderror" />
                    <input type="text" id="image_link_check_banner1" style="display:none"
                        name="image_link_check_banner1" value="{{$sliders->firstWhere('id', 2)->image_link}}">
                    <img id="previewImage_banner1"
                        src="{{asset('/img/slider-banner/' . $sliders->firstWhere('id', 2)->image_link) }}"
                        class="mt-2 img-thumbnail" alt="Preview">
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

                    <!--Slider 2 -->
                    <h6 class="text-dark mb-2 mt-4">Slider 2</h6>
                    <input type="file" style="display:none" name="image_link_banner2" id="image_link_banner2"
                        onclick="previewImage_banner2()"
                        class="shadow form-control @error('image_link_banner2') is-invalid @enderror" />
                    <input type="text" id="image_link_check_banner2" style="display:none"
                        name="image_link_check_banner2" value="{{$sliders->firstWhere('id', 3)->image_link}}">
                    <img id="previewImage_banner2"
                        src="{{asset('/img/slider-banner/' . $sliders->firstWhere('id', 3)->image_link) }}"
                        class="mt-2 img-thumbnail" alt="Preview">
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

                    <!--Slider 3 -->
                    <h6 class="text-dark mb-2 mt-4">Slider 3</h6>
                    <input type="file" style="display:none" name="image_link_banner3" id="image_link_banner3"
                        onclick="previewImage_banner3()"
                        class="shadow form-control @error('image_link_banner3') is-invalid @enderror" />
                    <input type="text" id="image_link_check_banner3" style="display:none"
                        name="image_link_check_banner3" value="{{$sliders->firstWhere('id', 4)->image_link}}">
                    <img id="previewImage_banner3"
                        src="{{asset('/img/slider-banner/' . $sliders->firstWhere('id', 4)->image_link) }}"
                        class="mt-2 img-thumbnail" alt="Preview">
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