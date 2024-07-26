@extends('main.master')
@section('content')
<?php
use App\Models\Image;

$slider_images = Image::where('group', 2)->get();
$long_images = Image::where('group', 3)->get();
?>
<!-- Nội dung chính -->
<main class="row">
    <!--Slider cho banner-->
    <div class="slider container">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                @if(count($slider_images) > 0)
                @foreach($slider_images as $index => $slider_image)
                <div class="carousel-item @if($index == 0) active @endif">
                    <img src="{{ asset('/img/slider-banner/' . $slider_image->image_link) }}" class="d-block w-100"
                        alt="..." />
                </div>

                @endforeach
                @endif
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Trước</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Sau</span>
            </button>
        </div>
    </div>
    <!--Slider cho banner-->

    <!-- Tivi -->
    <div class="col-12 mt-2 mb-2">
        <div class="container bg-warning-subtle border border-dark rounded-4">
            <div class="col-12 py-3">
                <div class="row">
                    <div
                        class="col-12 text-center bg-secondary-subtle text-dark border-top border-bottom border-dark mb-2 p-1">
                        <h2>TIVI</h2>
                    </div>
                </div>
                <div class="container">
                    <div class="qa-home-product d-flex">



                        @if(count($tivis) > 0)
                        @foreach ($tivis as $tivi)
                        <!-- Sản phẩm -->

                        <div class="card mx-2 border border-dark col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                            <a href="{{route('main.products.show', $tivi->id)}}">
                                <div class="text-center mt-1 ">
                                    <img src="{{ asset($tivi->image_link) }}" class="border-0" alt="..." />
                                </div>
                            </a>

                            <div class="card-body">
                                <form class="add-to-cart-form">
                                    @csrf
                                    <a class="mt-1 mb-1" href="{{route('main.products.show', $tivi->id)}}">
                                        <h5 class="card-title">
                                            {{$tivi->name}}
                                        </h5>
                                    </a>
                                    <span class="product-price-old">
                                        {{number_format($tivi->old_price, 0, ',', '.')}}
                                    </span>
                                    <br />
                                    <span class="product-price"> {{number_format($tivi->price, 0, ',', '.')}}</span><br>
                                    <input type="number" value="1" name="quantity" hidden>
                                    <input type="number" value="{{$tivi->id}}" name="product_id" hidden>
                                    <button type="submit" class="mt-1  btn btn-outline-dark" type="button">
                                        Thêm vào giỏ
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Sản phẩm -->
                        @endforeach
                        @else
                        <p>Đang cập nhật</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tivi-->

    <!--Long banner-->
    @if($long_images->has(0))
    <div class="container-fluid">
        <img src="{{ asset('/img/long-banner/' . $long_images->get(0)->image_link) }}" class="img-fluid" />
    </div>
    @endif


    <!-- Tủ lạnh -->
    <div class="col-12 mt-2 mb-2">
        <div class="container bg-primary-subtle border border-dark rounded-4">
            <div class="col-12 py-3">
                <div class="row">
                    <div
                        class="col-12 text-center bg-secondary-subtle text-dark border-top border-bottom border-dark mb-2 p-1">
                        <h2>TỦ LẠNH</h2>
                    </div>
                </div>
                <div class="container">
                    <div class="qa-home-product d-flex">
                        @if(count($tulanhs) > 0)
                        @foreach ($tulanhs as $tulanh)
                        <!-- Sản phẩm -->
                        <div class="card mx-2 border border-dark col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                            <a href="{{route('main.products.show', $tulanh->id)}}">
                                <div class="text-center mt-1 ">
                                    <img src="{{ asset($tulanh->image_link) }}" class="border-0" alt="..." />
                                </div>
                            </a>
                            <div class="card-body">
                                <form class="add-to-cart-form">
                                    @csrf
                                    <a class="mt-1 mb-1" href="{{route('main.products.show', $tulanh->id)}}">
                                        <h5 class="card-title">
                                            {{$tulanh->name}}
                                        </h5>
                                    </a>
                                    <span class="product-price-old">
                                        {{number_format($tulanh->old_price, 0, ',', '.')}}
                                    </span>
                                    <br />
                                    <span class="product-price">{{number_format($tulanh->price, 0, ',', '.')}}
                                    </span><br>
                                    <input type="number" value="1" name="quantity" hidden>
                                    <input type="number" value="{{$tulanh->id}}" name="product_id" hidden>
                                    <button type="submit" class="mt-1  btn btn-outline-dark" type="button">
                                        Thêm vào giỏ
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- Sản phẩm -->
                        @endforeach
                        @else
                        <p>Đang cập nhật</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tủ lạnh-->

    <!--Long banner-->
    @if($long_images->has(1))
    <div class="container-fluid">
        <img src="{{ asset('/img/long-banner/' . $long_images->get(1)->image_link) }}" class="img-fluid" />
    </div>
    @endif

    <!-- Máy giặt -->
    <div class="col-12 mt-2 mb-2">
        <div class="container bg-success-subtle border border-dark rounded-4">
            <div class="col-12 py-3">
                <div class="row">
                    <div
                        class="col-12 text-center bg-secondary-subtle text-dark border-top border-bottom border-dark mb-2 p-1">
                        <h2>MÁY GIẶT</h2>
                    </div>
                </div>
                <div class="container">
                    <div class="qa-home-product d-flex">
                        @if(count($maygiats) > 0)
                        @foreach ($maygiats as $maygiat)
                        <!-- Sản phẩm -->
                        <div class="card mx-2 border border-dark col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                            <a href="{{route('main.products.show', $maygiat->id)}}">
                                <div class="text-center mt-1 ">
                                    <img src="{{ asset($maygiat->image_link) }}" class="border-0" alt="..." />
                                </div>
                            </a>
                            <div class="card-body">
                                <form class="add-to-cart-form">
                                    @csrf
                                    <a class="mt-1 mb-1" href="{{route('main.products.show', $maygiat->id)}}">
                                        <h5 class="card-title">
                                            {{$maygiat->name}}
                                        </h5>
                                    </a>
                                    <span class="product-price-old">
                                        {{number_format($maygiat->old_price, 0, ',', '.')}}
                                    </span>
                                    <br />
                                    <span class="product-price">{{number_format($maygiat->price, 0, ',', '.')}}
                                    </span><br>
                                    <input type="number" value="1" name="quantity" hidden>
                                    <input type="number" value="{{$maygiat->id}}" name="product_id" hidden>
                                    <button type="submit" class="mt-1  btn btn-outline-dark" type="button">
                                        Thêm vào giỏ
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- Sản phẩm -->
                        @endforeach
                        @else
                        <p>Đang cập nhật</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Máy giặt-->

    <!--Long banner-->

    @if($long_images->has(2))
    <div class="container-fluid">
        <img src="{{ asset('/img/long-banner/' . $long_images->get(2)->image_link) }}" class="img-fluid" />
    </div>
    @endif

    <!-- Điều hòa -->
    <div class="col-12 mt-2 mb-2">
        <div class="container bg-info-subtle border border-dark rounded-4">
            <div class="col-12 py-3">
                <div class="row">
                    <div
                        class="col-12 text-center bg-secondary-subtle text-dark border-top border-bottom border-dark mb-2 p-1">
                        <h2>ĐIỀU HÒA</h2>
                    </div>
                </div>
                <div class="container">
                    <div class="qa-home-product d-flex">
                        @if(count($dieuhoas) > 0)
                        @foreach ($dieuhoas as $dieuhoa)
                        <!-- Sản phẩm -->
                        <div class="card mx-2 border border-dark col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                            <a href="{{route('main.products.show', $dieuhoa->id)}}">
                                <div class="text-center mt-1 ">
                                    <img src="{{ asset($dieuhoa->image_link) }}" class="border-0" alt="..." />
                                </div>
                            </a>
                            <div class="card-body">
                                <form class="add-to-cart-form">
                                    @csrf
                                    <a class="mt-1 mb-1" href="{{route('main.products.show', $dieuhoa->id)}}">
                                        <h5 class="card-title">
                                            {{$dieuhoa->name}}
                                        </h5>
                                    </a>
                                    <span class="product-price-old">
                                        {{number_format($dieuhoa->old_price, 0, ',', '.')}}
                                    </span>
                                    <br />
                                    <span class="product-price"> {{number_format($dieuhoa->price, 0, ',', '.')}}
                                    </span><br>
                                    <input type="number" value="1" name="quantity" hidden>
                                    <input type="number" value="{{$dieuhoa->id}}" name="product_id" hidden>
                                    <button type="submit" class="mt-1  btn btn-outline-dark" type="button">
                                        Thêm vào giỏ
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- Sản phẩm -->
                        @endforeach
                        @else
                        <p>Đang cập nhật</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Điều hòa-->
</main>
<!-- Nội dung chính -->

<!--Long banner-->
@if($long_images->has(3))
<div class="container-fluid">
    <img src="{{ asset('/img/long-banner/' . $long_images->get(3)->image_link) }}" class="img-fluid" />
</div>
@endif


<!--Thêm vào giỏ-->
<script src="{{ asset('js/add-to-cart.js') }}"></script>
@endsection