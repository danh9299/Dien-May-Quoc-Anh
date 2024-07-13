@extends('main.master')
@section('content')
<div class="col-12">

    <main class="row">
        <div class="row">
            <div class="col-12 py-3">
                <div class="row">
                    <div class="col-12 text-center text-uppercase">
                        <h2>Tất cả tin tức mới nhất</h2>
                    </div>
                </div>
                <div class="row qa-list-article px-5">

                    @if(count($articles)>0)

                    @foreach ($articles as $article)

                    <div class="mb-3  card mx-2 border border-dark col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <a href="{{route('main.articles.show',$article->id)}}">
                            <div class="text-center mt-1 ">
                                <img src="{{ asset($article->image_link) }}" class="img-thumbnail border-0" alt="..." />
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
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        {{-- Nút Trang trước --}}
                        @if ($articles->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">&laquo; Trước</span>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $articles->previousPageUrl() }}"
                                aria-label="Trang trước">&laquo;
                                Trước</a>
                        </li>
                        @endif

                        {{-- Hiển thị trang hiện tại và các trang gần đó --}}
                        @for ($i = max(1, $articles->currentPage() - 3); $i <= min($articles->lastPage(),
                            $articles->currentPage() + 3); $i++)
                            <li class="page-item {{ $i == $articles->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $articles->url($i) }}">{{ $i }}</a>
                            </li>
                            @endfor

                            {{-- Nút Trang kế tiếp --}}
                            @if ($articles->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $articles->nextPageUrl() }}" aria-label="Trang tiếp">Sau
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





    </main>

</div>

<script src="{{asset('js/check_filter_price.js')}}"></script>
@endsection