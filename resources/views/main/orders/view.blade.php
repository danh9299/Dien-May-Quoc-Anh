@extends('main.master')

@section('content')
<div class="container">
    <h1 class="text-center mt-2 mb-2">Chi tiết đơn hàng</h1>

    <div class="card">
        <div class="card-header">
            <h3>Thông tin đơn hàng</h3>
        </div>
        <div class="card-body">
            <p><strong>Mã đơn hàng:</strong> {{ $order->id }}</p>
            <p><strong>Tổng tiền:</strong> {{ number_format($order->total_amount, 0, ',', '.') }} VND</p>
            <p><strong>Phương thức thanh toán:</strong> {{ $order->payment_method == 'cod' ? 'Thanh toán khi nhận hàng' : 'Chuyển khoản' }}</p>
           
        </div>
    </div>

    <h3 class="mt-4">Sản phẩm trong đơn hàng</h3>
    <table class="table table-bordered border-dark table-hover">
        <thead>
            <tr>
                <th scope="col">Ảnh</th>
                <th class="text-wrap" style="width: 15rem;" scope="col">Tên</th>
                <th scope="col">Model</th>
                <th scope="col">Hãng</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td><img style="max-width:100px; max-height:100px" src="{{ asset($item->product->image_link) }}" class="admin-product-image" alt="{{ $item->product->model }}" /></td>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->product->model }}</td>
                <td>{{ $item->product->brand->name }}</td>
                <td>{{ number_format($item->price, 0, ',', '.') }} VND</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->price * $item->quantity, 0, ',', '.') }} VND</td>
            </tr>
            @endforeach
        </tbody>
    </table>

   
</div>
@endsection
