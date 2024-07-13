@extends('main.master')

@section('content')
<div class="container">
    <h1 class="text-center mt-2 mb-2">Chi tiết đơn hàng</h1>

    @if (session('success'))
    <div class="container">
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    </div>
    @endif

    @if (session('error'))
    <div class="container">
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3>Thông tin đơn hàng</h3>
        </div>
        <div class="card-body">
            <p><strong>Mã đơn hàng:</strong> {{ $order->id }}</p>
            <p><strong>Tổng tiền:</strong> {{ number_format($order->total_amount, 0, ',', '.') }} VND</p>
            <p class="card-text"><strong>Địa chỉ nhận hàng:</strong> {{ $order->address }}</p>
            <p><strong>Phương thức thanh toán:</strong>
                {{ $order->payment_method == 'cod' ? 'Thanh toán khi nhận hàng' : 'Chuyển khoản' }}</p>
            <p><strong>Trạng thái:</strong> {{ $order->status  }}</p>
            <p><strong>Thanh toán:</strong> {{ $order->payment_status }}</p>
        </div>
    </div>

    <h3 class="mt-4">Sản phẩm trong đơn hàng</h3>
    <table class="table table-bordered border-dark table-hover">
        <thead>
            <tr>

                <th class="text-wrap" style="width: 15rem;" scope="col">Tên</th>


                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thành tiền</th>

            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>

                <td>{{ $item->product_name }}</td>


                <td>{{ number_format($item->price, 0, ',', '.') }} VND</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->price * $item->quantity, 0, ',', '.') }} VND</td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection