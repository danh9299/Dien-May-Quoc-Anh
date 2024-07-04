@extends('admin.master')

@section('content')


<div class="row">
    <h3 class="mt-2 px-5">Hủy đơn hàng</h3>

    <div class="container mt-2 px-5  mb-2">
        <div class="card shadow">
            <div class="card-header">
                Hủy đơn hàng..
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.orders.destroy',$order->id)}}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('delete')
                    <h5 class="card-title">Thông tin người đặt hàng</h5>
            <p class="card-text">Họ và tên: {{ $order->user->name }}</p>
            <p class="card-text">Số điện thoại: {{ $order->user->phone_number }}</p>
            <p class="card-text">Email: {{ $order->user->email }}</p>
            <p class="card-text">Địa chỉ nhận hàng: {{ $order->address }}</p>
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

            <h5 class="card-title mt-4"><strong>Tổng tiền đơn hàng:</strong> {{ number_format($order->total_amount, 0, ',', '.') }} VND
            </h5>
            <h5 class="card-text"><strong>Doanh thu:</strong> {{number_format($order->revenue, 0, ',', '.') }} VND</h5>
            <h5 class="card-title mt-4">Trạng thái: <b>{{$order->status}}</b>
            </h5>
            <h5 class="card-title mt-4">Phương thức thanh toán:
                @if ($order->payment_method == "cod")
                    <b>Thanh toán khi nhận hàng</b>
                @else
                    <b>Chuyển khoản</b>
                @endif
            </h5>
                   
                    <p>Bạn muốn hủy đơn hàng này chứ?</p>
                    <button type="submit" class="btn btn-danger">Có</button>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Không</a>
                </form>
            </div>
        </div>

    </div>
</div>






@endsection('content')