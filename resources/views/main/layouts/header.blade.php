<?php
use App\Models\Catalog;
use App\Models\Brand;
use App\Models\Image;
use App\Models\Footer;
$footer = Footer::where('id',1)->first();

$logo = Image::where('group',1)->first();
$main_catalogs = Catalog::where('parent_id',0)->get();
$brands = Brand::all();
?>

<header class="container-fluid">
    <!-- Top Nav -->
    <div class="col-12 bg-danger py-2 d-md-block d-none">
        <div class="row">
            <div class="col-auto me-auto">
                <ul class="qa-top-nav">
                    <li>
                    <a href="tel:{{$footer->hotline1}}">{{$footer->hotline1}}</a>
                    </li>
                    <li>
                    <a href="tel:{{$footer->hotline2}}">{{$footer->hotline2}}</a>
                    </li>
                    <li>
                    <a href="tel:{{$footer->hotline3}}">{{$footer->hotline3}}</a>
                    </li>
                    <li>
                    <a href="tel:{{$footer->hotline4}}">{{$footer->hotline4}}</a>
                    </li>
                </ul>
            </div>
            <div class="col-auto">
            @if (Auth::guard('web')->check())
                <ul class="qa-top-nav">
                    <li>
                        <a href="#">Xin chào {{ auth()->guard('web')->user()->name }}</a>
                    </li>
                    <li>
                        <a href="{{ route('main.auth.logout') }}">
                            Đăng xuất
                        </a>

                    </li>
                </ul>
                @else
                <ul class="qa-top-nav">
                    <li>
                        <a href="{{route('main.auth.register')}}">Đăng Ký</a>
                    </li>
                    <li>
                        <a href="{{route('main.auth.login')}}">Đăng nhập</a>
                    </li>
                </ul>
                
                @endif
            </div>
        </div>
    </div>
    <!-- Top Nav -->

    <!-- Top Nav Mobile-->

    <div class="container-fluid qa-top-nav-mobile bg-danger d-lg-none d-md-none d-sm-block">
        <div class="row">
            <div class="col-auto me-auto">
                <a href="tel:0903283996">090.328.3996</a>
                <a href="tel:0962538373">096.253.8373</a><br />
                <a href="tel:0913047388">091.304.7388</a>
                <a href="tel:0338093232">033.809.3232</a>
            </div>
            <div class="col-auto ms-auto">
                @if (Auth::guard('web')->check())
                <ul class="qa-top-nav">
                    <li>
                    <a href="#">Xin chào {{ auth()->guard('web')->user()->name }}</a>
                    </li>
                    <li>
                        <a href="{{ route('main.auth.logout') }}">
                            Đăng xuất
                        </a>

                    </li>
                </ul>
                @else
                <ul class="qa-top-nav">
                    <li>
                        <a href="{{route('main.auth.register')}}">Đăng Ký</a>
                    </li>
                    <li>
                        <a href="{{route('main.auth.login')}}">Đăng nhập</a>
                    </li>
                </ul>
                
                @endif
            </div>
        </div>
    </div>
    <!-- Top Nav -->

    <!-- Header -->
    <div class="col-12 bg-white pt-3">
        <div class="row">
            <!--Logo-->
            <div class="col-lg-auto">
                <div class="qa-logo text-center text-lg-left">
                    <a href="{{ route('main.home') }}"><img src="{{ asset('/img/logo/' . $logo->image_link) }}" class=""
                            alt="dienmayquocanh.com" /></a>
                </div>
            </div>
            <!--Thanh tìm kiếm-->
            <div class="col-lg-5 mx-auto mt-4 mt-lg-0">
           
                <form method="GET" action="{{ route('main.search') }}">
                    <div class="form-group">
                        <div class="qa-search input-group">
                            <input type="text" name="search" class="form-control border-danger"
                                placeholder="Nhập thông tin tìm kiếm..."  />
                            <button type="submit" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!--Giỏ hàng-->
            <div class="col-lg-auto text-center text-lg-left header-item-holder">
                <a href="#" class="qa-header-cart">
                    Giỏ hàng
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-cart4" viewBox="0 0 16 16">
                        <path
                            d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Nav -->
        <div class="row qa-navbar-categories" id="category-to-sticky">
            <nav class="navbar navbar-expand-lg bg-danger-subtle col-12">
                <!-- Navbar toggler button -->

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mainNav">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('main.home') }}">Trang chủ</a>
                        </li>
                        @if(count($main_catalogs )>0)
                        @foreach($main_catalogs as $main_catalog)
                        @if($main_catalog->id != 0)
                        <li class="nav-item dropdown">
                            <a class="nav-link " href="{{route('main.products.list-no-brand',$main_catalog->id)}}"  
                                >{{$main_catalog->catalog_name}}</a>

                            <div class="dropdown-menu">
                                @if(count($brands) >0)
                                @foreach($brands as $brand)
                                @if($brand->id != 0)
                                <a class="dropdown-item" href="{{route('main.products.list-with-brand',['catalog_id' => $main_catalog->id, 'brand_id' => $brand->id])}}">
                                    <!--href="route('',gửi id brand và gửi id catalog_id sau đó select product where id và id)"-->
                                    {{$main_catalog->catalog_name}} {{$brand->name}}
                                </a>
                                @endif
                                @endforeach
                                @endif
                            </div>

                        </li>
                        @endif
                        @endforeach
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
        <!-- Nav -->
    </div>
    <!-- Header -->
</header>
