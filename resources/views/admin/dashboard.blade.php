<?php 
use App\Models\Product;
$products = Product::orderBy('quantity', 'asc')->limit(10)->get();
?>
@extends('admin.master')
@section('content')

<h3 class="mt-2 px-5">Tổng quan</h3>
    <div class="text-danger mt-1 px-5">
        Chào mừng {{ auth()->guard('admin')->user()->name }} đến với trang Dashboard!
    </div>
    <h2 class="mt-2 text-center ">--- CHÚ Ý ---</h2>
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