@extends('admin.master')
@section('content')

<div class="row">
    <h3 class="mt-2 px-5">Đánh giá của khách hàng</h3>
    <!--Alert message-->
    @if($message = Session::get('success'))
    <div class="container px-3">
        <div class="mt-5 alert alert-success">
            {{ $message }}
        </div>
    </div>
    @endif
    <div class="container mt-2 px-5  mb-2">
        <div class="card shadow">
            <div class="card-header">
                <div class="row">
                   
                    <div class="col">
                        <form method="GET" action="{{route('admin.settings.reviews.search-reviews')}}">
                            <div class="input-group flex-nowrap">
                                <button type="submit" class="btn btn-dark">Tìm kiếm</button>
                                <input type="text" class="form-control" name="search"
                                    placeholder="Nhập tên nội dung bạn muốn tìm.." aria-label="Tìm kiếm"
                                    aria-describedby="addon-wrapping">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
               
                <table class="table table-hover">
                @if(!empty($reviews) && count($reviews)>0)
                    <thead>
                        <tr>
                            <th scope="col">Tên</th>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Đánh giá</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($reviews as $review)
                        @if($review->id !=0)
                        <tr>
                       
                            <td>{{ $review->user->name }}</td>
                            
                            <td>{{ $review->product->name }}</td>
                            <td>{{ $review->comment }}</td>
                            <td><a href="{{route('admin.settings.reviews.delete', $review->id)}}" class="btn btn-danger"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg></a></td>
                          
                        </tr>
                        @endif
                        @endforeach

                    </tbody>
                    @else
                    <tr>
                        <td colspan="5" class="text-center">Hiện chưa có khách hàng nào!</td>
                    </tr>
                    @endif

                </table>

                <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        {{-- Nút Trang trước --}}
        @if ($reviews->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">&laquo; Trước</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $reviews->previousPageUrl() }}" aria-label="Trang trước">&laquo; Trước</a>
            </li>
        @endif

        {{-- Hiển thị trang hiện tại và các trang gần đó --}}
        @for ($i = max(1, $reviews->currentPage() - 3); $i <= min($reviews->lastPage(), $reviews->currentPage() + 3); $i++)
            <li class="page-item {{ $i == $reviews->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $reviews->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        {{-- Nút Trang kế tiếp --}}
        @if ($reviews->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $reviews->nextPageUrl() }}" aria-label="Trang tiếp">Sau &raquo;</a>
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