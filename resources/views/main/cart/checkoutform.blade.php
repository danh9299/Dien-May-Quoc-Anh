<!-- resources/views/main/cart/checkout.blade.php -->
@extends('main.master')
@section('content')
<h1 class="text-center mt-2 mb-2">Thanh toán</h1>
<div class="container">
    <form action="{{ route('main.cart.checkout') }}" method="POST">
        @csrf
        <table class="table table-bordered border-dark table-hover">
            <thead>
                <tr>
                    <th scope="col">Ảnh</th>
                    <th class="text-wrap" style="width: 15rem;" scope="col">Tên</th>
                    <th scope="col">Model</th>
                    <th scope="col">Hãng</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart->items as $item)
                <tr>
                    <th scope="row"><img style="max-width:100px; max-height:100px"
                            src="{{ asset($item->product->image_link) }}" class="admin-product-image"
                            alt="{{$item->product->model}}" /></th>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->product->model }}</td>
                    <td>{{ $item->product->brand->name }}</td>
                    <td>{{ number_format($item->product->price) }} VNĐ</td>
                    <td>{{ $item->quantity }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="form-group mb-2">
            <label for="address" class="mb-2">Địa chỉ nhận hàng:</label>
            <textarea name="address" class="form-control">{{$cart->user->address}}</textarea>
        </div>
        <div class="form-group mb-2">
            <label for="payment_method" class="mb-2">Phương thức thanh toán:</label>
            <select class="form-control" id="payment_method" name="payment_method" required>
                <option value="cod">Thanh toán khi nhận hàng</option>
                <option value="bank_transfer">Chuyển khoản</option>
            </select>
        </div>

        <button class="btn btn-success mt-3 mb-3" type="submit">Tiến hành thanh toán</button>
    </form>
</div>
@endsection