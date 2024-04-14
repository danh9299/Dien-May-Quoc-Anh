<header class="container-fluid" >
    <!-- Top Nav -->
    <div class="col-12 bg-danger py-2 d-md-block d-none">
        <div class="row">
            <div class="col-auto me-auto">
                <ul class="qa-top-nav">
                    <li>
                        <a href="tel:0903283996"
                            >090.328.3996</a
                        >
                    </li>
                    <li>
                        <a href="tel:0962538373"
                            >096.253.8373</a
                        >
                    </li>
                    <li>
                        <a href="tel:0913047388"
                            >091.304.7388</a
                        >
                    </li>
                    <li>
                        <a href="tel:0338093232"
                            >033.809.3232</a
                        >
                    </li>
                </ul>
            </div>
            <div class="col-auto">
                <ul class="qa-top-nav">
                    <li>
                        <a href="register.html"
                            ><i class="fas fa-user-edit me-2"></i>Đăng Ký</a
                        >
                    </li>
                    <li>
                        <a href="login.html"
                            ><i class="fas fa-sign-in-alt me-2"></i>Đăng nhập</a
                        >
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Top Nav -->

    <!-- Top Nav Mobile-->

    <div class="container-fluid qa-top-nav-mobile bg-danger  d-lg-none d-md-none d-sm-block">
        <div class="row">
            <div class="col-auto me-auto">
                
                        <a href="tel:0903283996"
                            >090.328.3996</a
                        >
                        <a href="tel:0962538373"
                            >096.253.8373</a
                        ><br>
                        <a href="tel:0913047388"
                            >091.304.7388</a
                        >
                        <a href="tel:0338093232"
                            >033.809.3232</a
                        >
                   
            </div>
            <div class="col-auto ms-auto">
                <ul class="">
                    <li>
                        <a href="register.html"
                            ><i class="fas fa-user-edit me-2"></i>Đăng Ký</a
                        >
                    </li>
                    <li>
                        <a href="login.html"
                            ><i class="fas fa-sign-in-alt me-2"></i>Đăng nhập</a
                        >
                    </li>
                </ul>
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
                    <a href="{{ route('main.home') }}"
                        ><img
                            src="{{ asset('img/logo/QA.png') }}"
                            class=""
                            alt="dienmayquocanh.com"
                    /></a>
                </div>
            </div>
            <!--Thanh tìm kiếm-->
            <div class="col-lg-5 mx-auto mt-4 mt-lg-0">
                <form action="#">
                    <div class="form-group">
                        <div class="qa-search input-group">
                            <input
                                type="search"
                                class="form-control border-danger"
                                placeholder="Nhập thông tin tìm kiếm..."
                                required
                            />
                            <button class="btn btn-danger">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    fill="currentColor"
                                    class="bi bi-search"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"
                                    />
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
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                </svg>     
                </a>
            </div>

          

        </div>

        <!-- Nav -->
        <div class="row qa-navbar-categories" id="category-to-sticky">
            <nav class="navbar navbar-expand-lg  bg-danger-subtle col-12">

                 <!-- Navbar toggler button -->
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mainNav">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('main.home')}}">Trang chủ</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="tivi"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                                >Tivi</a
                            >
                            <div
                                class="dropdown-menu"
                                aria-labelledby="tivi"
                            >
                                <a class="dropdown-item" href="category.html"
                                    >Tivi Samsung</a
                                >
                                <a class="dropdown-item" href="category.html"
                                    >Tivi Sony</a
                                >
                                <a class="dropdown-item" href="category.html"
                                    >Tivi LG</a
                                >
                                <a class="dropdown-item" href="category.html"
                                    >Tivi TCL</a
                                >
                                <a class="dropdown-item" href="category.html"
                                    >Tivi Aqua</a
                                >
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="tu-lanh"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                                >Tủ lạnh</a
                            >
                            <div
                                class="dropdown-menu"
                                aria-labelledby="tu-lanh"
                            >
                                <a class="dropdown-item" href="category.html"
                                    >Tủ lạnh Toshiba</a
                                >
                                <a class="dropdown-item" href="category.html"
                                    >Tủ lạnh Samsung</a
                                >
                                <a class="dropdown-item" href="category.html"
                                    >Tủ lạnh LG</a
                                >
                                <a class="dropdown-item" href="category.html"
                                    >Tủ lạnh Sharp</a
                                >
                                <a class="dropdown-item" href="category.html"
                                    >Tủ lạnh Aqua</a
                                >
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="dieu-hoa"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                                >Điều hòa</a
                            >
                            <div class="dropdown-menu" aria-labelledby="dieu-hoa">
                                <a class="dropdown-item" href="category.html"
                                    >Điều hòa Panasonic</a
                                >
                                <a class="dropdown-item" href="category.html"
                                    >Điều hòa Casper</a
                                >
                                <a class="dropdown-item" href="category.html"
                                    >Điều hòa Sumikura</a
                                >
                                <a class="dropdown-item" href="category.html"
                                    >Điều hòa Gree</a
                                >
                                <a class="dropdown-item" href="category.html"
                                    >Điều hòa Sharp</a
                                >
                            </div>
                            
                        </li>
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="may-giat-may-say"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                                >Máy giặt máy sấy</a
                            >
                            <div class="dropdown-menu" aria-labelledby="may-giat-may-say">
                                <a class="dropdown-item" href="category.html"
                                    >Máy giặt máy sấy LG</a
                                >
                                <a class="dropdown-item" href="category.html"
                                    >Máy giặt máy sấy Electrolux</a
                                >
                               
                            </div>                            
                        </li>
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="tu-dong"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                                >Tủ đông</a
                            >
                            <div class="dropdown-menu" aria-labelledby="tu-dong">
                                <a class="dropdown-item" href="category.html"
                                    >Tủ đông Alaska</a
                                >
                                <a class="dropdown-item" href="category.html"
                                    >Tủ đông Sanaky</a
                                >
                               
                            </div>                            
                        </li>
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="am-thanh"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                                >Âm thanh</a
                            >
                            <div class="dropdown-menu" aria-labelledby="am-thanh">
                                <a class="dropdown-item" href="category.html"
                                    >Âm thanh Sony</a
                                >
                                <a class="dropdown-item" href="category.html"
                                    >Âm thanh Samsung</a
                                >
                            </div>                            
                        </li>
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="gia-dung"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                                >Gia dụng</a
                            >
                            <div class="dropdown-menu" aria-labelledby="gia-dung">
                                <a class="dropdown-item" href="category.html"
                                    >Nồi cơm</a
                                >
                                <a class="dropdown-item" href="category.html"
                                    >Lò vi sóng</a
                                >
                                <a class="dropdown-item" href="category.html"
                                    >Máy lọc không khí</a
                                >
                                <a class="dropdown-item" href="category.html"
                                    >Máy hút ẩm</a
                                >
                                <a class="dropdown-item" href="category.html"
                                    >Máy rửa bát</a
                                >
                                <a class="dropdown-item" href="category.html"
                                    >Máy hút bụi</a
                                >
                            </div>                            
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- Nav -->

       


    </div>
    <!-- Header -->
</header>
