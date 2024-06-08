@extends('main.master')
@section('content')

<!-- Main Content -->
<main class="row">
    <!--Đường liên kết tới sản phẩm-->
    <div class="container mt-2 qa-product-show-links">
        <ul>
            <li><a href="{{route('main.home')}}"> Trang chủ </a> ></li>
            <li><a href="#"> Tin tức</a>  > </li>
            <li> <a href="#" >{{$article->name}} </a> </li>

        </ul>
    </div>
    <!--Thông tin chính về sản phẩm-->
    <div class="container px-5">
        <div class="row">
            <!-- Product Images -->
            <div class="col-lg-6 col-md-5 col-sm-12 mb-3">
            <img  src="{{asset( $article->image_link) }}"
                            class="mt-2 img-thumbnail" alt="Preview">
            </div>
            <!-- Product Name và price -->
            <div class="col-lg-6 col-md-5 col-sm-12 mb-3  px-5">
                <h1>{{$article->name}}</h1>
                <ul>
                   
                    <li>Tác giả: <b>{{$article->admin->name}}</b></li>
                    <li>Ngày đăng:
                        <b>
                            {{$article->created_at}}
                        </b>
                    </li>
                    <li>Lần sửa cuối: <b>{{$article->updated_at}}</b></li>
                </ul>
               
            
            </div>
        </div>
    </div>


    <div class="container mt-5 mb-3">
        <div class="row px-2">
            <!--Nội dung bài viết-->
            <div class="col-12">
                <div>
                    <h1 class="text-center"> Thông tin bài viết</h1><br>
                </div>
                <div class="qa-product-content-size border border-5 p-5 overflow-hidden">
                    {!! $article->content !!}


                </div>
                <!-- Button trigger modal -->
                <div class="d-grid gap-2">
                    <button type="button" class="rounded-top-0 btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#product-content-modal">
                        Đọc thêm
                    </button>
                </div>

                <!-- Large modal -->
                <div class="modal fade" id="product-content-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Thông tin bài viết</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {!! $article->content !!}
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
    </div>
</main>
<!-- Main Content -->



@endsection