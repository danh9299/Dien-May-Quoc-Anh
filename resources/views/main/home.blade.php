@extends('main.master')

@section('content')

<!-- Main Content -->
<main class="row">


<!-- Tivi -->
<div class="col-12 mt-2 mb-2">
    <div class="container bg-warning-subtle border border-dark rounded-4">
        <div class="col-12 py-3">
            <div class="row">
                <div class="col-12 text-center bg-secondary-subtle text-dark border-top border-bottom border-dark mb-2 p-1">
                    <h2>TIVI</h2>
                </div>
            </div>
            <div class="container">
            <div class=" home-product d-flex">
                @for ($i = 0; $i < 10; $i++)
                <!-- Product -->
                <div class="card mx-2 border border-dark col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 " >
                    <img src="https://product.hstatic.net/200000632093/product/smart-tivi-qled-4k-55-inch-samsung-qa55q80c-1-180x120_-_copy_29bea3df638846b6a5cbb41802242082_large.jpg" class="img-thumbnail" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Smart Tivi QLED 4K 98 inch Samsung QA98Q80C</h5>
                        <span class="product-price-old">
                                    99.000.000đ
                                </span>
                                <br>
                                <span class="product-price">
                                    97.500.000đ
                                </span>
                                <button class="btn btn-outline-dark" type="button"><i class="fas fa-cart-plus me-2"></i>Thêm vào giỏ</button>
                    </div>
                </div>
                <!-- Product -->
                @endfor
            </div>
            </div>
        </div>
    </div>
</div>
<!-- Tivi-->


    



<!-- Tủ lạnh -->
<div class="col-12 mt-2 mb-2">
    <div class="container bg-primary-subtle border border-dark rounded-4">
        <div class="col-12 py-3">
            <div class="row">
                <div class="col-12 text-center bg-secondary-subtle text-dark border-top border-bottom border-dark mb-2 p-1">
                    <h2>TỦ LẠNH</h2>
                </div>
            </div>
            <div class="container">
            <div class=" home-product d-flex">
                @for ($i = 0; $i < 10; $i++)
                <!-- Product -->
                <div class="card mx-2 border border-dark col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2" >
                    <img src="https://product.hstatic.net/200000632093/product/10025649-tl-sharp-sj-fx630v-st-01_62073da735fc4ec6a0481d6ad1f95271_large.jpg" class="img-thumbnail" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tủ lạnh Sharp 4 cánh 626 Lít SJ-FX630V-ST</h5>
                        <span class="product-price-old">
                                    18.000.000đ
                                </span>
                                <br>
                                <span class="product-price">
                                    14.500.000đ
                                </span>
                                <button class="btn btn-outline-dark" type="button"><i class="fas fa-cart-plus me-2"></i>Thêm vào giỏ</button>
                    </div>
                </div>
                <!-- Product -->
                @endfor
            </div>
            </div>
        </div>
    </div>
</div>
<!-- Tủ lạnh-->



<!-- Máy giặt -->
<div class="col-12 mt-2 mb-2">
    <div class="container bg-success-subtle border border-dark rounded-4">
        <div class="col-12 py-3">
            <div class="row">
                <div class="col-12 text-center bg-secondary-subtle text-dark border-top border-bottom border-dark mb-2 p-1">
                    <h2>MÁY GIẶT</h2>
                </div>
            </div>
            <div class="container">
            <div class=" home-product d-flex">
                @for ($i = 0; $i < 10; $i++)
                <!-- Product -->
                <div class="card mx-2 border border-dark col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2" >
                    <img src="https://product.hstatic.net/200000632093/product/may-giat-midea-mfg70-1000-7-kg_ac7b2b4c9af548af90444dc6e1b38672_large.jpg" class="img-thumbnail" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Máy giặt 7 Kg Midea MFG70-1000</h5>
                        <span class="product-price-old">
                                    5.800.000đ
                                </span>
                                <br>
                                <span class="product-price">
                                    4.800.000đ
                                </span>
                                <button class="btn btn-outline-dark" type="button"><i class="fas fa-cart-plus me-2"></i>Thêm vào giỏ</button>
                    </div>
                </div>
                <!-- Product -->
                @endfor
            </div>
            </div>
        </div>
    </div>
</div>
<!-- Máy giặt-->


<!-- Điều hòa -->
<div class="col-12 mt-2 mb-2">
    <div class="container bg-info-subtle border border-dark rounded-4">
        <div class="col-12 py-3">
            <div class="row">
                <div class="col-12 text-center bg-secondary-subtle text-dark border-top border-bottom border-dark mb-2 p-1">
                    <h2>ĐIỀU HÒA</h2>
                </div>
            </div>
            <div class="container">
            <div class=" home-product d-flex">
                @for ($i = 0; $i < 10; $i++)
                <!-- Product -->
                <div class="card mx-2 border border-dark col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2" >
                    <img src="https://product.hstatic.net/200000632093/product/may-lanh-electrolux-inverter-1-5hp-esv12cro-c1-sl_eccd0dc1f07d40bb959557a6576f87c9_large.jpg" class="img-thumbnail" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Điều hòa Electrolux Inverter 1.5HP ESV12CRO-C1</h5>
                        <span class="product-price-old">
                                    8.800.000đ
                                </span>
                                <br>
                                <span class="product-price">
                                    7.800.000đ
                                </span>
                                <button class="btn btn-outline-dark" type="button"><i class="fas fa-cart-plus me-2"></i>Thêm vào giỏ</button>
                    </div>
                </div>
                <!-- Product -->
                @endfor
            </div>
            </div>
        </div>
    </div>
</div>
<!-- Điều hòa-->


</main>
<!-- Main Content -->



@endsection