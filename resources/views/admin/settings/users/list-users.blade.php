@extends('admin.master')
@section('content')

<div class="row">
    <h3 class="mt-2 px-5">Khách hàng</h3>
    <div class="container mt-2 px-5  mb-2">
        <div class="card shadow">
            <div class="card-header">
                <div class="row">

                    <div class="col">
                        <form method="GET" action="{{route('admin.settings.users.search-users')}}">
                            <div class="input-group flex-nowrap">
                                <button type="submit" class="btn btn-dark">Tìm kiếm</button>
                                <input type="text" class="form-control" name="search"
                                    placeholder="Nhập tên khách hàng bạn muốn tìm.." aria-label="Tìm kiếm"
                                    aria-describedby="addon-wrapping">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <table class="table table-hover">
                    @if(!empty($users) && count($users)>0)
                    <thead>
                        <tr>
                            <th scope="col">Tên</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Email</th>
                            <th scope="col">Địa chỉ</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($users as $user)
                        @if($user->id !=0)
                        <tr>

                            <td>{{ $user->name }}</td>

                            <td>{{ $user->phone_number }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->address }}</td>

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
                        @if ($users->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">&laquo; Trước</span>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $users->previousPageUrl() }}" aria-label="Trang trước">&laquo;
                                Trước</a>
                        </li>
                        @endif

                        {{-- Hiển thị trang hiện tại và các trang gần đó --}}
                        @for ($i = max(1, $users->currentPage() - 3); $i <= min($users->lastPage(),
                            $users->currentPage() + 3); $i++)
                            <li class="page-item {{ $i == $users->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                            </li>
                            @endfor

                            {{-- Nút Trang kế tiếp --}}
                            @if ($users->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $users->nextPageUrl() }}" aria-label="Trang tiếp">Sau
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