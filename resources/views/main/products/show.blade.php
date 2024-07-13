@extends('main.master')
@section('content')

<!-- Main Content -->
<main class="row">
    <!--Đường liên kết tới sản phẩm-->
    <div class="container mt-2 qa-product-show-links">
        <ul>
            <li><a href="{{route('main.home')}}"> Trang chủ </a> > </li>
            <li><a href="#"> {{$product->catalog->catalog_name}}</a> </li>

        </ul>
    </div>
    <!--Thông tin chính về sản phẩm-->
    <div class="container px-5">
        <div class="row">
            <!-- Product Images -->
            <div class="col-lg-4 col-md-5 col-sm-12 mb-3">
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
                            <img src="{{ asset($product->image_link) }}" class="d-block w-100" alt="...">
                        </div>

                        @if(is_array(json_decode($product->image_list)))
                        @foreach(json_decode($product->image_list) as $image_list_item)
                        <div class="carousel-item">
                            <img src="{{ asset($image_list_item) }}" class="d-block w-100" alt="...">
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
            <div class="col-lg-8 col-md-5 col-sm-12 mb-3  px-5">
                <h1>{{$product->name}}</h1>
                <ul>
                    <li>Mã sản phẩm: <b>{{$product->model}}</b></li>
                    <li>Thương hiệu: <a href="#">{{$product->brand->name}}</a></li>
                    <li>Tình trạng:
                        <b>
                            @if($product->quantity > 0)
                            Còn hàng
                            @else
                            Hết hàng
                            @endif
                        </b>
                    </li>
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
                <form class="add-to-cart-form">
                    @csrf
                    <div class="row mt-2 d-flex">
                        <div class="col-lg-3 col-sm-6">
                            <h3 for="qty">Số lượng:</h3>
                        </div>
                        <div class="col-lg-2 col-sm-6">
                            <input type="number" id="qty" min="1" value="1" name="quantity" class="form-control"
                                required>
                        </div>
                    </div>



                    <input type="number" value="{{$product->id}}" name="product_id" hidden>


                    <button type="submit" class="mt-1  btn btn-outline-dark" type="button">
                        Thêm vào giỏ
                    </button>
                </form>
            </div>
        </div>
    </div>


    <div class="container mt-5 mb-3">
        <div class="row px-2">
            <!--Nội dung bài viết-->
            <div class="col-lg-8 col-sm-12">
                <div>
                    <h1 class="text-center"> Thông tin sản phẩm</h1>
                </div>
                <div class="qa-product-content-size   overflow-hidden">
                    {!! $product->content !!}


                </div>
                <!-- Nút mở modal -->
                <div class="d-grid gap-2">
                    <button type="button" class="rounded-top-0 btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#product-content-modal">
                        Đọc thêm
                    </button>
                </div>

                <!-- modal lớn -->
                <div class="modal fade" id="product-content-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Thông tin sản phẩm</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {!! $product->content !!}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Thông số kỹ thuật-->
            <div class="col-lg-4 col-sm-12">
                <div class="text-center">
                    <h1>Thông số kỹ thuật</h1>
                </div>
                <div class="qa-product-specifications-size bg-secondary-subtle border  border-dark  overflow-hidden">
                    {!!
                    $product->specifications !!}</div>
                <!-- Nút mở modal -->
                <div class="d-grid gap-2">
                    <button type="button" class="rounded-top-0 btn btn-danger border  border-dark border-top-0"
                        data-bs-toggle="modal" data-bs-target="#product-specification-modal">
                        Đọc thêm
                    </button>
                </div>

                <!-- modal lớn -->
                <div class="modal fade" id="product-specification-modal" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Thông số kỹ thuật</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body ">
                                {!! $product->specifications !!}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>




<!--Các sản phẩm cùng Hãng-->
<div class="container mt-2 mb-3">
    <div class="text-center">
        <h2>Xem thêm các sản phẩm cùng danh mục</h2>
    </div>
    <div class="qa-home-product d-flex overflow-x-scroll">
        @if(count($similar_products) > 0)
        @foreach ($similar_products as $similar_product)
        <!-- Product -->
        <div class="card mx-2 border border-dark col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <a href="{{route('main.products.show', $similar_product->id)}}">
                <div class="text-center mt-1 ">
                    <img src="{{ asset($similar_product->image_link) }}" class="img-thumbnail border-0" alt="..." />
                </div>
            </a>
            <div class="card-body">
                <a href="{{route('main.products.show', $similar_product->id)}}">
                    <h5 class="card-title">
                        {{$similar_product->name}}
                    </h5>
                </a>
                <span class="product-price-old">
                    {{number_format($similar_product->old_price, 0, ',', '.')}}
                </span>
                <br />
                <span class="product-price">{{number_format($similar_product->price, 0, ',', '.')}} </span>
               
            </div>
        </div>
        @endforeach
        @else
        <p>Đang cập nhật</p>
        @endif
    </div>
</div>
<hr>
<!--Đánh giá-->
<!-- Form để thêm đánh giá mới -->

@auth
<div class="container">
    <h3>Thêm nhận xét:</h3>
    <form action="{{ route('main.reviews.store') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div>

            <textarea class="form-control" name="comment" id="comment" cols="30" rows="5" required></textarea>
        </div>

        <button class="mt-1 mb-1 btn btn-dark" type="submit">Đánh giá</button>
    </form>
</div>
@else
<div class="container">
    <p>Bạn phải <a href="{{route('main.auth.login')}}">đăng nhập</a> để nhận xét sản phẩm..</p>
</div>
@endauth
<!-- Hiển thị đánh giá sản phẩm -->
<!-- Nút mở modal -->
<div class="mt-3 container mb-2">
    <h3>Đánh giá sản phẩm mới nhất:</h3>
    @if ($product->reviews->count() > 0)
    <div class="d-grid gap-2">
        <button type="button" class="rounded-top-0 btn btn-danger border border-dark border-top-0"
            data-bs-toggle="modal" data-bs-target="#reviews-modal">
            Xem các đánh giá
        </button>
    </div>
</div>
@else
<p>Chưa có đánh giá sản phẩm.</p>

@endif

<!-- Modal lớn -->
<div class="modal fade" id="reviews-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Đánh giá sản phẩm mới nhất:</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <div class="qa-review-list">
                    @php
                    $reviews = $product->reviews->take(20);
                    @endphp
                    @foreach ($reviews as $review)
                    <div class="card mt-2 mb-2" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{ $review->user->name }}</strong></h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Ngày: {{ $review->created_at }}</h6>
                            <p class="card-text">{{ $review->comment }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>






<!-- Add-to-cart -->
<script src="{{ asset('js/add-to-cart.js') }}"></script>




@endsection