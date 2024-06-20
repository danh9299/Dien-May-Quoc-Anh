<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    protected $guard;

    public function __construct()
    {
        $this->guard = 'web'; // 'web' cho users
    }

    public function addToCart(Request $request)
    {
        $user = Auth::guard($this->guard)->user();

        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        $cartItem = $cart->items()->updateOrCreate(
            ['product_id' => $request->product_id],
            ['quantity' => \DB::raw('quantity + ' . $request->quantity)]
        );

        // Trả về thông báo thành công
        return 'Thêm vào giỏ thành công!';
    }

    public function viewCart()
    {
        $user = Auth::guard($this->guard)->user();

        $cart = Cart::where('user_id', $user->id)->with('items.product')->first();
        return view('main.cart.view', compact('cart'));
    }

    public function checkout(Request $request)
    {
        $user = Auth::guard($this->guard)->user();

        $cart = Cart::where('user_id', $user->id)->with('items.product')->first();

        // Xử lý logic thanh toán ở đây

        $cart->items()->delete();
        $cart->delete();

        return redirect()->route('home')->with('success', 'Checkout successful!');
    }
}

