<?php
use App\Models\Footer;
$footer = Footer::where('id',1)->first();
?>


<!-- Footer -->
<footer class="container-fluid">
    <div class="col-12 bg-dark text-white pb-3 pt-5">
        <div class="row">
            <div class="col-lg-6 col-sm-6 text-sm-left mb-sm-0 mb-3">
                <div class="row">
                    <div class="col-12">
                        <div class="qa-footer-address text-center">
                            <h3>Thông tin công ty</h3>
                        </div>
                    </div>
                    <div class="col-12 qa-footer-address-info">
                        <ul>
                            @if(!is_null($footer->address))
                            <li>
                                Địa chỉ:
                                <a href="#">{{$footer->address}}</a>
                            </li>
                            @endif
                            @if(!is_null($footer->email))
                            <li>
                                Email:
                                <a href="mailto:quocanh2017.ltd@gmail.com">{{$footer->email}}</a>
                            </li>
                            @endif
                            @if(!is_null($footer->hotline1))
                            <li>
                                Hotline 1:
                                <a href="tel:{{$footer->hotline1}}">{{$footer->hotline1}}</a>
                            </li>
                            @endif
                            @if(!is_null($footer->hotline2))
                            <li>
                                Hotline 2:
                                <a href="tel:{{$footer->hotline2}}">{{$footer->hotline2}}</a>
                            </li>
                            @endif
                            @if(!is_null($footer->hotline3))
                            <li>
                                Hotline 3:
                                <a href="tel:{{$footer->hotline3}}">{{$footer->hotline3}}</a>
                            </li>
                            @endif
                            @if(!is_null($footer->hotline4))
                            <li>
                                Hotline 4:
                                <a href="tel:{{$footer->hotline4}}">{{$footer->hotline4}}</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-5 ms-lg-auto ms-sm-0 ms-auto mb-sm-0 mb-3">
                <div class="row">
                <div class="qa-footer-policy text-center">
                        <h3>Đường dẫn tắt</h3>
                    </div>
                    <div class="col-12">
                        <ul class="qa-footer-policy-info">
                            <li>
                                <a href="{{route('main.products.list-all-products')}}">Tất cả sản phẩm</a>
                            </li>
                            <li>
                                <a href="{{route('main.articles.list-all-articles')}}">Tin tức</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-5 ms-lg-auto ms-sm-0 ms-auto mb-sm-0 mb-3">
                <div class="row">
                    <div class="qa-footer-policy text-center">
                        <h3>Chính sách</h3>
                    </div>
                    <div class="col-12">
                        <ul class="qa-footer-policy-info">
                            <li>
                                <a href="{{route('main.policies.servicePolicy')}}">Điều khoản dịch vụ</a>
                            </li>
                            <li>
                                <a href="{{route('main.policies.returnPolicy')}}">Chính sách đổi trả</a>
                            </li>
                            <li>
                                <a href="{{route('main.policies.securePolicy')}}">Chính sách bảo mật</a>
                            </li>
                         
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-sm-2 col-4 me-auto mb-sm-0 mb-3">
                <div class="row">
                    <div class="qa-social text-center">
                        <h3>Mạng xã hội</h3>
                    </div>
                    <div class="col-12">
                        <ul class="qa-social-links">
                            <li>
                                @if(is_null( $footer->link_instagram ))
                                <a href="#">Instagram</a>
                                @else
                                <a href="{{$footer->link_instagram}}">Instagram</a> 
                                @endif
                            </li>
                            <li>
                            @if(is_null( $footer->link_facebook ))
                                <a href="#">Instagram</a>
                                @else
                                <a href="{{$footer->link_facebook}}">Facebook</a> 
                                @endif
                            </li>
                            <li>
                            @if(is_null( $footer->link_tiktok ))
                                <a href="#">Tiktok</a>
                                @else
                                <a href="{{$footer->link_tiktok}}">Tikotk</a> 
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row bg-danger p-2 text-dark">
        <div class="text-center">
            Bản quyền website thuộc về Nguyễn Duy Anh
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-c-circle"
                viewBox="0 0 16 16">
                <path
                    d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.146 4.992c-1.212 0-1.927.92-1.927 2.502v1.06c0 1.571.703 2.462 1.927 2.462.979 0 1.641-.586 1.729-1.418h1.295v.093c-.1 1.448-1.354 2.467-3.03 2.467-2.091 0-3.269-1.336-3.269-3.603V7.482c0-2.261 1.201-3.638 3.27-3.638 1.681 0 2.935 1.054 3.029 2.572v.088H9.875c-.088-.879-.768-1.512-1.729-1.512" />
            </svg>
            nguyenduyanh.tit@gmail.com
        </div>
    </div>
</footer>
<!-- Footer -->