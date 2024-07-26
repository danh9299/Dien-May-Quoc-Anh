@extends('admin.master')

@section('content')
<div class="container">
    <h1 class="mt-2 mb-3">Danh sách đơn hàng {{$month->month}}.{{$month->year}}</h1>
    <div class="card mt-2 mb-3">
        <div class="card-header">

            <!-- Form lọc đơn hàng theo tháng -->
            <form method="GET" action="{{ route('admin.orders.index') }}">
                <div class="row p-1">

                    <div class="col-3">
                        <input lang="vi" type="month" name="month" class="form-control" value="{{ request('month') }}">
                    </div>
                    <div class="col-1">
                        <button type="submit" class="btn btn-dark">Lọc</button>
                    </div>
                    <!-- Hiển thị tổng doanh thu -->

                    <div class="col-8 text-end">
                        @if ($orders->onFirstPage())
                        @if (auth()->guard('admin')->user()->role == 1)
                        <h4>Tổng doanh thu tháng {{$month->month}}.{{$month->year}}:
                            <strong>{{ number_format($totalRevenue, 0, ',', '.') }} VND</strong>
                        </h4>
                        @else
                        <h3>Thông tin các đơn hàng tháng {{$month->month}}.{{$month->year}}</h3>
                        @endif
                        @endif
                    </div>

                </div>
            </form>

        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Mã đơn</th>
                        <th scope="col">Ngày đặt hàng</th>
                        <th scope="col">Người đặt hàng</th>
                        <th scope="col">Số điện thoại</th>
                        @if (auth()->guard('admin')->user()->role == 1)
                        <th scope="col">Doanh thu</th>
                        @endif
                        <th scope="col">Tổng tiền</th>
                        <th>Phương thức thanh toán</th>
                        <th>Trạng thái giao</th>
                        <th>Thanh toán</th>
                        <th scope="col">Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->user->phone_number }}</td>
                        @if (auth()->guard('admin')->user()->role == 1)
                        <td>{{ number_format( $order->revenue, 0, ',', '.') }} </td>
                        @endif
                        <td>{{ number_format($order->total_amount, 0, ',', '.') }} VND</td>
                        <td>@if ($order->payment_method == "cod")
                            Thanh toán khi nhận hàng
                            @else
                            Chuyển khoản
                            @endif</ td>
                        <td>{{$order->status}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td><a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-primary">Xem</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>








    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            {{-- Nút Trang trước --}}
            @if ($orders->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">&laquo; Trước</span>
            </li>
            @else
            <li class="page-item">
                <a class="page-link" href="{{ $orders->previousPageUrl() }}" aria-label="Trang trước">&laquo; Trước</a>
            </li>
            @endif

            {{-- Hiển thị trang hiện tại và các trang gần đó --}}
            @for ($i = max(1, $orders->currentPage() - 3); $i <= min($orders->lastPage(), $orders->currentPage() + 3);
                $i++)
                <li class="page-item {{ $i == $orders->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $orders->url($i) }}">{{ $i }}</a>
                </li>
                @endfor

                {{-- Nút Trang kế tiếp --}}
                @if ($orders->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $orders->nextPageUrl() }}" aria-label="Trang tiếp">Sau &raquo;</a>
                </li>
                @else
                <li class="page-item disabled">
                    <span class="page-link">Sau &raquo;</span>
                </li>
                @endif
        </ul>
    </nav>
</div>
@endsection