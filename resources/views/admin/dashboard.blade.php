<?php 
use App\Models\Product;
use App\Models\Order;
$products = Product::orderBy('quantity', 'asc')->limit(10)->get();
$orders = Order::orderBy('updated_at', 'desc')->limit(10)->get();

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
$year=Carbon::now()->year;
$month = Carbon::now()->month;
$startOfMonth = Carbon::create($year, $month, 1)->startOfMonth();
$endOfMonth = Carbon::create($year, $month, 1)->endOfMonth();

$totalRevenue = DB::table('orders')
        ->where('payment_status', 'Đã thanh toán')
        ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
        ->sum('revenue');

?>
@extends('admin.master')
@section('content')

<h1 class="mt-2 px-5">Tổng quan</h1>
<div class="text-danger mt-1 px-5">
    Quản trị viên đang sử dụng: {{ auth()->guard('admin')->user()->name }}
</div>
<h2 class="mt-2 text-center ">--- CHÚ Ý ---</h2>

<div class="container mt-3">
    <!--Tổng doanh thu-->
    <h3 class="mb-5">Tổng số doanh thu trong tháng:<strong> {{number_format($totalRevenue , 0, ',', '.')}} </strong>
    </h3>
</div>
<div class="container mt-3">
    <!--Đơn đặt gần nhất-->
    <h4>10 đơn hàng được đặt gần đây nhất </h4>
    <table class="table table-bordered table-warning table-hover">
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
                <td>@if ($order->payment_method =="cod")
                    Thanh toán khi nhận hàng
                    @else
                    Chuyển khoản
                    @endif</td>
                <td>{{$order->status}}</td>
                <td>

                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-primary">Xem</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!--Sản phẩm sắp hết hàng-->
<div class="container mt-3">
    <h4>10 sản phẩm sau sắp hết hàng</h4>
    <table class="table-dark table-hover table table-bordered">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Model</th>
                <th>Giá bán</th>
                <th>Số lượng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->model }}</td>
                <td>{{ $product->price }}</td>
                <td><b>{{ $product->quantity }}</b></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>





@endsection