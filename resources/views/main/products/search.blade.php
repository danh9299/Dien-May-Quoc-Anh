@extends('main.master')
@section('content')
<div class="col-12">
    <!-- Nội dung chính-->
    <main class="row">
        <div class="col-12 px-5 ">
            <div class="row">
                <div class="col-12 py-3">
                    <div class="row qa-list-product px-1">
                        <!-- Sản phẩm -->
                        @if(count($products)>0)
                        <div class="col-12 text-center text-uppercase">
                            <h2>Sản phẩm bạn tìm</h2>
                        </div>
                        @foreach ($products as $product)

                        <div class="mb-3  card mx-2 border border-dark col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                            <a href="{{route('main.products.show',$product->id)}}">
                                <div class="text-center mt-1 ">
                                    <img src="{{ asset($product->image_link) }}" class="img-thumbnail border-0"
                                        alt="..." />
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
                                <form class="add-to-cart-form">
                                    @csrf
                                    <input type="number" value="1" name="quantity" hidden>
                                    <input type="number" value="{{$product->id}}" name="product_id" hidden>
                                    <button type="submit" class="mt-1  btn btn-outline-dark" type="button">
                                        Thêm vào giỏ
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    @if(count($articles)>0)
                    <div class="row">
                        <div class="col-12 text-center text-uppercase">
                            <h2>Tin tức bạn tìm</h2>
                        </div>
                    </div>
                    <div class="row qa-list-article px-5">
                        @if(count($articles)>0)
                        @foreach ($articles as $article)
                        <div class="mb-3  card mx-2 border border-dark col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                            <a href="{{route('main.articles.show',$article->id)}}">
                                <div class="text-center mt-1 ">
                                    <img src="{{ asset($article->image_link) }}" class="img-thumbnail border-0"
                                        alt="..." />
                                </div>
                            </a>
                            <div class="card-body">
                                <a href="{{route('main.articles.show',$article->id)}}">
                                    <h5 class="card-title">
                                        {{$article->name}}
                                    </h5>
                                </a>
                                <h6 class="card-title">
                                    {{$article->created_at}}
                                </h6>
                                <br />
                                <p5>
                                    {{$article->meta_description}}
                                </p5>

                            </div>
                        </div>

                        @endforeach

                        @else
                        <p>Đang cập nhật</p>
                        @endif
                    </div>
                    @endif
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
        @if(count($products) <= 0 && count($articles) <=0 ) <h3 class="text-center mb-5 mt-5"> Xin lỗi chúng tôi không
            tìm thấy thông tin bạn cần tìm!</h3>
            @endif
    </main>
    <!-- Nội dung chính -->
</div>
<!--Add-to-cart-->
<script src="{{ asset('js/add-to-cart.js') }}"></script>
@endsection