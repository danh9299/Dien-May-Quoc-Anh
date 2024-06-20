@extends('main.master')
@section('content')
<h1 class="text-center mt-2 mb-2 ">---Giỏ hàng---</h1>
<div class="container px-4">
   
    @if($cart && $cart->items->count() > 0)
        <ul>
            @foreach($cart->items as $item)
                <li>
                    {{ $item->product->name }} - Quantity: {{ $item->quantity }}
                </li>
            @endforeach
        </ul>
        <form action="{{ route('main.cart.checkout') }}" method="POST">
            @csrf
            <button type="submit">Proceed to Checkout</button>
        </form>
    @else
        <p>Your cart is empty.</p>
    @endif
    </div>
@endsection