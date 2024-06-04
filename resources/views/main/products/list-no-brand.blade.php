
@extends('main.master')
@section('content')
<div class="col-12">
    <!-- Main Content -->
    <main class="row">

        <!-- Category Products -->
    
        <div class="col-md-2 qa-filter-product p-4  mt-4">
            <h3 class="text-center"> Bộ Lọc {{$catalog->catalog_name}}</h3>
            <hr>
            <h4 class="mt-2 mb-2">Lọc hãng</h4>
            <form action="">
                @if(count($filter_brands) >0)
                @foreach($filter_brands as $filter_brand)
                @if($filter_brand->id != 0)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="">
                    <label class="form-check-label">
                        {{$filter_brand->name}}
                    </label>
                </div>
                @endif
                @endforeach  
                @endif
            </form>
            <h4 class="mt-2 mb-2">Lọc thiết kế</h4>
            <form action="">
            @if(count($filter_features) >0)
            @foreach($filter_features as $filter_feature)
            @if($filter_feature->id != 0)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="">
                    <label class="form-check-label">
                        {{$filter_feature->name}}
                    </label>
                </div>
                @endif
                @endforeach  
                @endif
            </form>
            <h4 class="mt-2 mb-2">Lọc phân loại</h4>
            <form action="">
            @if(count($filter_types) >0)
            @foreach($filter_types as $filter_type)
            @if($filter_type->id != 0)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="">
                    <label class="form-check-label">
                        {{$filter_type->name}}
                    </label>
                </div>
                @endif
                @endforeach  
                @endif 
            </form>
        </div>
        <div class="col-md-10 col-sm-12">
            <div class="row">
                <div class="col-12 py-3">
                    <div class="row">
                        <div class="col-12 text-center text-uppercase">
                            <h2>{{$catalog->catalog_name}}</h2>
                        </div>
                    </div>
                    <div class="row qa-list-product px-1">

                        <!-- Product -->
                        @if(count($products)>0)

                        @foreach ($products as $product)
                        <!-- Product -->
                        <div class="mb-3  card mx-2 border border-dark col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                            <a href="{{route('main.products.show',$product->id)}}">
                                <div class="text-center mt-1 ">
                                    <img src="{{ asset('/img/product_images/' . $product->image_link) }}"
                                        class="img-thumbnail border-0" alt="..." />
                                </div>
                            </a>

                            <div class="card-body">
                                <a href="{{route('main.products.show',$product->id)}}">
                                    <h5 class="card-title">
                                        {{$product->name}}
                                    </h5>
                                </a>
                                <span class="product-price-old">
                                    {{number_format($product->old_price, 0, ',', '.')}}
                                </span>
                                <br />
                                <span class="product-price"> {{number_format($product->price, 0, ',', '.')}}</span>
                                <button class="btn btn-outline-dark" type="button">
                                    Thêm vào giỏ
                                </button>
                            </div>
                        </div>
                        <!-- Product -->
                        @endforeach

                        @else
                        <p>Đang cập nhật</p>
                        @endif
                        <!-- Product -->


                    </div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            {{-- Nút Trang trước --}}
                            @if ($products->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">&laquo; Trước</span>
                            </li>
                            @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $products->previousPageUrl() }}"
                                    aria-label="Trang trước">&laquo;
                                    Trước</a>
                            </li>
                            @endif

                            {{-- Hiển thị trang hiện tại và các trang gần đó --}}
                            @for ($i = max(1, $products->currentPage() - 3); $i <= min($products->lastPage(),
                                $products->currentPage() + 3); $i++)
                                <li class="page-item {{ $i == $products->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                                </li>
                                @endfor

                                {{-- Nút Trang kế tiếp --}}
                                @if ($products->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $products->nextPageUrl() }}"
                                        aria-label="Trang tiếp">Sau
                                        &raquo;</a>
                                </li>
                                @else
                                <li class="page-item disabled">
                                    <span class="page-link">Sau &raquo;</span>
                                </li>
                                @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Category Products -->



    </main>
    <!-- Main Content -->
</div>
@endsection