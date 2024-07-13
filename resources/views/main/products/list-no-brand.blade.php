@extends('main.master')
@section('content')
<div class="col-12">
    <!-- Nội dung chính -->
    <main class="row">
        <div class="col-md-2 col-sm-12 qa-filter-product p-4  mt-4">
            <!--Desktop-->
            <div class="d-lg-block d-none">
                <h3 class="text-center"> Bộ Lọc {{$catalog->catalog_name}}</h3>
                <hr>
                <form action="{{ route('main.products.list-no-brand', $catalog->id) }}" id="filterForm" method="GET">
                    <h4 class="mt-2 mb-2">Lọc hãng</h4>

                    @if(count($filter_brands) > 0)
                    @foreach($filter_brands as $filter_brand)
                    @if($filter_brand->id != 0)
                    <div class="form-check">
                        <input class="form-check-input" name="brands[]" type="checkbox" value="{{ $filter_brand->id }}"
                            {{ in_array($filter_brand->id, request('brands', [])) ? 'checked' : '' }}>
                        <label class="form-check-label">
                            {{$filter_brand->name}}
                        </label>
                    </div>
                    @endif
                    @endforeach
                    @endif

                    <h4 class="mt-2 mb-2">Lọc thiết kế</h4>
                    @if(count($filter_features) > 0)
                    @foreach($filter_features as $filter_feature)
                    @if($filter_feature->id != 0)
                    <div class="form-check">
                        <input class="form-check-input" name="features[]" type="checkbox"
                            value="{{ $filter_feature->id }}"
                            {{ in_array($filter_feature->id, request('features', [])) ? 'checked' : '' }}>
                        <label class="form-check-label">
                            {{$filter_feature->name}}
                        </label>
                    </div>
                    @endif
                    @endforeach
                    @endif

                    <h4 class="mt-2 mb-2">Lọc phân loại</h4>
                    @if(count($filter_types) > 0)
                    @foreach($filter_types as $filter_type)
                    @if($filter_type->id != 0)
                    <div class="form-check">
                        <input class="form-check-input" name="types[]" type="checkbox" value="{{ $filter_type->id }}"
                            {{ in_array($filter_type->id, request('types', [])) ? 'checked' : '' }}>
                        <label class="form-check-label">
                            {{$filter_type->name}}
                        </label>
                    </div>
                    @endif
                    @endforeach
                    @endif

                    <h4 class="mt-2 mb-2">Lọc theo giá</h4>
                    <div class="form-group">
                        <label for="min_price">Giá thấp nhất</label>
                        @if(request()->has('min_price'))
                        <input type="number" class="form-control" id="min_price" name="min_price"
                            value="{{ request('min_price') }}">
                        @else
                        <input type="number" class="form-control" id="min_price" name="min_price" value="0">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="max_price">Giá cao nhất</label>
                        @if(request()->has('max_price'))
                        <input type="number" class="form-control" id="max_price" name="max_price"
                            value="{{ request('max_price') }}">
                        @else
                        <input type="number" class="form-control" id="max_price" name="max_price" value="999999999">
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Lọc</button>
                </form>
            </div>

            <!--Mobile-->
            <div class="text-center  d-lg-none d-block">
                <button class="btn btn-secondary btn-filter-sticky" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                    Lọc sản phẩm
                </button>
            </div>


            <div class="col-sm-12 offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop"
                aria-labelledby="staticBackdropLabel">
                <div class="offcanvas-header">
                    <h3 class="text-center"> Bộ Lọc {{$catalog->catalog_name}}</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div>

                        <form action="{{ route('main.products.list-no-brand', $catalog->id) }}" id="filterForm"
                            method="GET">
                            <h4 class="mt-2 mb-2">Lọc hãng</h4>

                            @if(count($filter_brands) > 0)
                            @foreach($filter_brands as $filter_brand)
                            @if($filter_brand->id != 0)
                            <div class="form-check">
                                <input class="form-check-input" name="brands[]" type="checkbox"
                                    value="{{ $filter_brand->id }}"
                                    {{ in_array($filter_brand->id, request('brands', [])) ? 'checked' : '' }}>
                                <label class="form-check-label">
                                    {{$filter_brand->name}}
                                </label>
                            </div>
                            @endif
                            @endforeach
                            @endif

                            <h4 class="mt-2 mb-2">Lọc thiết kế</h4>
                            @if(count($filter_features) > 0)
                            @foreach($filter_features as $filter_feature)
                            @if($filter_feature->id != 0)
                            <div class="form-check">
                                <input class="form-check-input" name="features[]" type="checkbox"
                                    value="{{ $filter_feature->id }}"
                                    {{ in_array($filter_feature->id, request('features', [])) ? 'checked' : '' }}>
                                <label class="form-check-label">
                                    {{$filter_feature->name}}
                                </label>
                            </div>
                            @endif
                            @endforeach
                            @endif

                            <h4 class="mt-2 mb-2">Lọc phân loại</h4>
                            @if(count($filter_types) > 0)
                            @foreach($filter_types as $filter_type)
                            @if($filter_type->id != 0)
                            <div class="form-check">
                                <input class="form-check-input" name="types[]" type="checkbox"
                                    value="{{ $filter_type->id }}"
                                    {{ in_array($filter_type->id, request('types', [])) ? 'checked' : '' }}>
                                <label class="form-check-label">
                                    {{$filter_type->name}}
                                </label>
                            </div>
                            @endif
                            @endforeach
                            @endif

                            <h4 class="mt-2 mb-2">Lọc theo giá</h4>
                            <div class="form-group">
                                <label for="min_price">Giá thấp nhất</label>
                                @if(request()->has('min_price'))
                                <input type="number" class="form-control" id="min_price" name="min_price"
                                    value="{{ request('min_price') }}">
                                @else
                                <input type="number" class="form-control" id="min_price" name="min_price" value="0">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="max_price">Giá cao nhất</label>
                                @if(request()->has('max_price'))
                                <input type="number" class="form-control" id="max_price" name="max_price"
                                    value="{{ request('max_price') }}">
                                @else
                                <input type="number" class="form-control" id="max_price" name="max_price"
                                    value="999999999">
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Lọc</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>




        <!--Danh sách-->
        <div class="col-md-10 col-sm-12">
            <div class="row">
                <div class="col-12 py-3">
                    <div class="row">
                        <div class="col-12 text-center text-uppercase">
                            <h2>{{$catalog->catalog_name}}</h2>
                        </div>
                    </div>
                    <div class="row qa-list-product px-1">

                    
                        @if(count($products)>0)

                        @foreach ($products as $product)
                     
                        <div class="mb-3  card mx-2 border border-dark col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                            <a href="{{route('main.products.show',$product->id)}}">
                                <div class="text-center mt-1 ">
                                    <img src="{{ asset($product->image_link) }}" class="img-thumbnail border-0"
                                        alt="..." />
                                </div>
                            </a>

                            <div class="card-body">
                                <form class="add-to-cart-form">
                                    @csrf
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
                                    <input type="number" value="1" name="quantity" hidden>
                                    <input type="number" value="{{$product->id}}" name="product_id" hidden>
                                    <button type="submit" class="mt-1  btn btn-outline-dark" type="button">
                                        Thêm vào giỏ
                                    </button>
                                </form>
                            </div>
                        </div>
                     
                        @endforeach

                        @else
                        <p>Đang cập nhật</p>
                        @endif
                    


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
      



    </main>
    <!-- Nội dung chính -->
</div>

<script src="{{asset('js/check_filter_price.js')}}"></script>
<!--Add-to-cart-->
<script src="{{ asset('js/add-to-cart.js') }}"></script>
@endsection