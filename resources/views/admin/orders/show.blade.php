@extends('admin.master')

@section('content')

@if($message = Session::get('success'))
<div class="container">
    <div class="mt-5 px-5 alert alert-success">
        {{ $message }}
    </div>
</div>
@endif
<div class="container">
    <h1 class="mt-2 mb-3">Chi tiết đơn hàng #{{ $order->id }}</h1>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-auto me-auto">
                    <h5>
                        Ngày đặt hàng: {{ $order->created_at->format('d/m/Y H:i') }}</h5>
                </div>
                <div class="col-auto">
                    @if ($order->status != 'Đã giao')
                    <form action="{{ route('admin.orders.markAsDelivered', $order->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Đã giao</button>
                    </form>
                    @else
                    <form action="{{ route('admin.orders.markAsUnDelivered', $order->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Hủy giao</button>
                    </form>
                    @endif
                </div>
                <div class="col-auto">
                    @if ($order->payment_status != 'Đã thanh toán')
                    <form action="{{ route('admin.orders.markAsPayDone', $order->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Đã thanh toán</button>
                    </form>
                    @else
                    <form action="{{ route('admin.orders.markAsPayNotDone', $order->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Chưa thanh toán</button>
                    </form>
                    @endif
                </div>

            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title">Thông tin người đặt hàng</h5>
            <p class="card-text">Họ và tên: {{ $order->user->name }}</p>
            <p class="card-text">Số điện thoại: {{ $order->user->phone_number }}</p>
            <p class="card-text">Email: {{ $order->user->email }}</p>
            <p class="card-text">Địa chỉ nhận hàng: {{ $order->address }}</p>

            <h5 class="card-title mt-4">Sản phẩm trong đơn hàng:</h5>
            <table class="table table-bordered border-dark table-hover">
                <thead>
                    <tr>
                        <th scope="col">Tên sản phẩm</th>

                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->product_name }}</td>

                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price, 0, ',', '.') }} VND</td>
                        <td>{{ number_format($item->quantity * $item->price, 0, ',', '.') }} VND</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

            <h5 class="card-title mt-4"><strong>Tổng tiền đơn hàng:</strong>
                {{ number_format($order->total_amount, 0, ',', '.') }} VND
            </h5>
            @if (auth()->guard('admin')->user()->role == 1)
            <h5 class="card-text"><strong>Doanh thu:</strong> {{number_format($order->revenue, 0, ',', '.') }} VND</h5>
            @endif
            <h5 class="card-title mt-4">Trạng thái: <b>{{$order->status}}</b>
            </h5>
            <h5 class="card-title mt-4">Phương thức thanh toán:
                @if ($order->payment_method == "cod")
                <b>Thanh toán khi nhận hàng</b>
                @else
                <b>Chuyển khoản</b>
                @endif
            </h5>
            @if (auth()->guard('admin')->user()->role == 1)
            <h5 class="card-title mt-4">Hủy đơn hàng:
                <a href="{{route('admin.orders.delete', $order->id)}}" class="btn btn-danger">Hủy đơn</a>
            </h5>
            @endif


            <div class="text-center">

                <a class="btn btn-secondary" href="{{route('admin.orders.index')}}">Trở lại</a>
            </div>
        </div>
    </div>
    @endsection