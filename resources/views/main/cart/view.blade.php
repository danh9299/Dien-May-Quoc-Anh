@extends('main.master')
@section('content')
<h1 class="text-center mt-2 mb-2 ">---Giỏ hàng---</h1>
<form action="{{ route('main.cart.checkout') }}" class="text-center mt-2 mb-2" method="POST">
    @csrf
    <button class="btn btn-success" type="submit">Tiến hành thanh toán</button>
</form>
<div class="container">

    <table class="table  table-bordered border-dark table-hover">
        @if($cart && $cart->items->count() > 0)
            <thead>
                <tr>
                    <th scope="col">Ảnh</th>
                    <th class="text-wrap" style="width: 15rem;" scope="col">Tên</th>
                    <th scope="col">Model</th>
                    <th scope="col">Hãng</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart->items as $item)
                    <tr>

                        <th scope="row"><img style="max-width:100px; max-height:100px"
                                src="{{ asset($item->product->image_link) }}" class="admin-product-image"
                                alt="{{$item->product->model}}" /></th>
                        <td>{{$item->product->name}}</td>
                        <td>{{$item->product->model}}</td>
                        <td>{{$item->product->brand->name}}</td>
                        <td>{{$item->product->price}}</td>
                        <td>{{$item->quantity}}</td>
                        <!-- Thêm button Xóa vào trong view -->
                        <td>
                            <form id="form-remove-{{$item->id}}"
                                action="{{ route('main.cart.remove', ['cart_item' => $item->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-remove"
                                    data-cart-item-id="{{$item->id}}">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        @else
            <p>Giỏ hàng của bạn đang trống.</p>
        @endif
    </table>

</div>
<form action="{{ route('main.cart.checkout') }}" class="text-center mt-2 mb-2" method="POST">
    @csrf
    <button class="btn btn-success" type="submit">Tiến hành thanh toán</button>
</form>


<script src="{{asset('js/delete-from-cart.js') }}">
   
</script>
@endsection
