@extends('main.master')
@section('content')
<!-- Main Content -->
<main class="row">
    <!--Đường liên kết tới sản phẩm-->
    <div class="container mt-2 qa-product-show-links">
        <ul>
            <li><a href="{{route('main.home')}}"> Trang chủ </a> > </li>
            <li><a href="#"> {{$product->catalog->catalog_name}}</a> > </li>
            <li><a href="#"> {{$product->name}} </a> </li>
           
        </ul>
    </div>

    <!--Thông tin chính về sản phẩm-->
    <div class="container px-5">
        <div class="row">
            <!-- Product Images -->
            <div class="col-lg-6 col-md-5 col-sm-12 mb-3">
                <div id="carouselExampleCaptions" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('/img/product_images/' . $product->image_link) }}" class="d-block w-100"
                                alt="...">
                        </div>
                      
                        @if(is_array( json_decode($product->image_list )))
                        @foreach(json_decode($product->image_list) as $image_list_item)
                        <div class="carousel-item">
                            <img src="{{ asset('/img/product_images/' . $image_list_item) }}" class="d-block w-100"
                                alt="...">
                        </div>
                        @endforeach
                        @endif

                    </div>
                    <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-danger" aria-hidden="true"></span>
                        <span class="visually-hidden">Trước</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-danger" aria-hidden="true"></span>
                        <span class="visually-hidden">Sau</span>
                    </button>
                </div>
            </div>

            <!-- Product Name và price -->
            <div class="col-lg-6 col-md-5 col-sm-12 mb-3  px-5">

                <h1>{{$product->name}}</h1>
                <ul>
                    <li>Mã sản phẩm: <b>{{$product->model}}</b></li>
                    <li>Thương hiệu: <a href="#">{{$product->brand->name}}</a></li>
                    <li>Tình trạng: <b>@if($product->quantity > 0) Còn hàng @else Hết hàng @endif</b></li>
                    <li>Thiết kế: <b>Độ phân giải 4K</b></li>
                </ul>
                <ul style="list-style:none">
                    <li>
                        <h2>Giá bán: <b class="text-danger"> {{number_format($product->price, 0, ',', '.')}}</b> </h2>
                    </li>
                    <li>
                        <h4>Giá cũ: <b class="text-secondary"><del>
                                    {{number_format($product->old_price, 0, ',', '.')}}</del></b> </h4>
                    </li>
                </ul>


                <div class="row mt-2 d-flex">
                    <div class="col-3">
                        <h3 for="qty">Số lượng:</h3>
                    </div>
                    <div class="col-2">
                        <input type="number" id="qty" min="1" value="1" class="form-control" required>
                    </div>
                </div>

                <div class="col-5 text-center mt-1">
                    <button class="btn btn-outline-danger" type="button"><i class="fas fa-cart-plus me-2"></i>Thêm vào
                        giỏ</button>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <!--Nội dung bài viết-->
    <div class="container mt-5 mb-3">
        <div class="row px-3">
            <div class="col-lg-8 col-md-12" >
            <div class="text-center">
                <h1> Thông tin sản phẩm</h1>
            </div>
            <div   class="qa-product-content-size border border-4 rounded border-dark overflow-auto">
            {!! $product->content !!}
            </div>
        </div>
       
            <div class="col-lg-4 col-md-12" > <div class="text-center">
                <h1>Thông số kỹ thuật</h1>
            </div>
            <div  class="qa-product-specifications-size border border-4 rounded border-dark overflow-auto">{!! $product->specifications !!}</div></div>
        </div>
    </div>



</main>
<!-- Main Content -->

@endsection