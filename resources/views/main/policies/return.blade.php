@extends('main.master')
@section('content')

<!-- Main Content -->
<main class="row">
    <!--Đường liên kết tới sản phẩm-->
    <div class="container mt-2 qa-product-show-links">
        <ul>
            <li><a href="{{route('main.home')}}"> Trang chủ </a> ></li>
            <li><a href="#"> Chính sách</a>  > </li>
            <li> <a href="#" >{{$policy->name}} </a> </li>

        </ul>
    </div>
    <!--Thông tin chính về chính sách-->
  


    <div class="container mt-5 mb-3">
        <div class="row px-2">
            <!--Nội dung bài viết-->
       
                <div>
                    <h1 class="text-center"> Thông tin {{$policy->name}}</h1><br>
                </div>
                <div class="  p-5 overflow-y-scroll">
                    {!! $policy->content !!}
                </div>
      
        </div>
    </div>
</main>
<!-- Main Content -->



@endsection