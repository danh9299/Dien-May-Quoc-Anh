@extends('main.master')
@section('content')
<!-- Main Content -->
<main class="row">
    <!--Đường liên kết tới sản phẩm-->
    <div class="container mt-2 qa-product-show-links">
        <ul>
            <li><a href="#"> Trang chủ </a> > </li>
            <li><a href="#"> Danh mục</a> > </li>
            <li><a href="#"> Sản phẩm </a> </li>
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
                            <img src="https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-1.jpg"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-2.jpg"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-3.jpg"
                                class="d-block w-100" alt="...">
                        </div>
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

                <h2>Smart Tivi QLED 4K 98 inch Samsung QA98Q80C</h2>
                <ul>
                    <li>Mã sản phẩm: <b>QA98Q80C</b></li>
                    <li>Thương hiệu: <a href="#">Samsung</a></li>
                    <li>Tình trạng: <b>Còn hàng</b></li>
                    <li>Cỡ: <b>98 inch</b></li>
                    <li>Tính năng: <b>Độ phân giải 4K</b></li>
                </ul>
                <ul style="list-style:none">
                    <li>
                        <h2>Giá bán: <b class="text-danger">97.500.000đ</b> </h2>
                    </li>
                    <li>
                        <h4>Giá cũ: <b class="text-secondary"><del>98.500.000đ</del></b> </h4>
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



</main>
<!-- Main Content -->

@endsection