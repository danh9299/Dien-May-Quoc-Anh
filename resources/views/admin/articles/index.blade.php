@extends('admin.master')
@section('content')

<div class="row">
    <h3 class="mt-2 px-5">Tin tức</h3>
    <div class="container mt-2 px-5  mb-2">

        @if($message = Session::get('success'))

        <div class="mt-5 alert alert-success">
            {{ $message }}
        </div>
        @endif
        <div class="card shadow">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <a href="{{route('admin.articles.create')}}" class="btn btn-primary">Thêm mới</a>
                    </div>
                    <div class="col">
                        <form method="GET" action="{{ route('admin.articles.search') }}">
                            <div class="input-group flex-nowrap">
                                <button type="submit" class="btn btn-dark">Tìm kiếm</button>
                                <input type="text" class="form-control" name="search"
                                    placeholder="Nhập tên tin tức bạn muốn tìm.." aria-label="Tìm kiếm"
                                    aria-describedby="addon-wrapping">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <table class="table table-hover">
                    @if(!empty($articles) && count($articles)>0)
                    <thead>
                        <tr>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Tác giả</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($articles as $article)
                        @if($article->id !=0)
                        <tr>
                            <th scope="row"><img src="{{ asset($article->image_link) }}" class="admin-product-image"
                                    alt="{{$article->name}}" /></th>
                            <td>{{ $article->name }}</td>

                            <td>{{ $article->admin->name }}</td>

                            <td><a href="{{route('admin.articles.edit', $article->id)}}" class="btn btn-warning"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg></a>
                                <a href="{{route('admin.articles.delete', $article->id)}}" class="btn btn-danger"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg></a>
                            </td>
                        </tr>
                        @endif
                        @endforeach

                    </tbody>
                    @else
                    <tr>
                        <td colspan="5" class="text-center">Hiện chưa có tin tức nào được tạo!</td>
                    </tr>
                    @endif

                </table>

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
                                aria-label="Trang trước">&laquo; Trước</a>
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

    </div>
</div>
@endsection