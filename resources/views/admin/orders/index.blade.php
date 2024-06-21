@extends('admin.master')

@section('content')
<div class="container">
    <h1 class="mt-2 mb-3">Danh sách đơn hàng</h1>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Ngày đặt hàng</th>
                <th scope="col">Người đặt hàng</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Email</th>
                <th scope="col">Tổng tiền</th>
                <th>Phương thức thanh toán</th>
                <th>Trạng thái</th>
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
                    <td>{{ $order->user->email }}</td>
                    <td>{{ number_format($order->total_amount, 0, ',', '.') }} VND</td>
                    <td>@if ($order->payment_method == "cod")
                        Thanh toán khi nhận hàng
                    @else
                        Chuyển khoản
                    @endif</
                    td>
                    <td>{{$order->status}}</td>
                    <td><a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-primary">Xem</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>





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
            @for ($i = max(1, $orders->currentPage() - 3); $i <= min($orders->lastPage(), $orders->currentPage() + 3); $i++)
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