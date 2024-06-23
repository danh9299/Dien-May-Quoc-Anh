@extends('main.master')

@section('content')
<div class="container">
    <h1 class="text-center mt-2 mb-2">Danh sách đơn hàng</h1>
    @if($message = Session::get('success'))

<div class="mt-5 alert alert-success">
    {{ $message }}
</div>
@endif
    @if($orders->isEmpty())
        <p class="text-center">Bạn chưa có đơn hàng nào.</p>
    @else
        <table class="table table-bordered border-dark table-hover">
            <thead>
                <tr>
                    <th scope="col">Mã đơn hàng</th>
                    <th scope="col">Ngày đặt hàng</th>
                    <th scope="col">Tổng tiền</th>
                  <th>Phương thức thanh toán</th>
                  <th>Thanh toán</th>
                  <th>Trạng thái giao</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ number_format($order->total_amount, 0, ',', '.') }} VND</td>
                    <td>@if ($order->payment_method =="cod")
                Thanh toán khi nhận hàng
                @else
                Chuyển khoản
                @endif</td>
                <td>{{$order->status}}</td>
                <td>{{$order->payment_status}}</td>
                    <td>
                        <a href="{{ route('main.orders.view', $order->id) }}" class="btn btn-primary">Xem chi tiết</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
