<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
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
        // Lấy thông tin sản phẩm
        $product = Product::find($request->product_id);
        // Kiểm tra nếu tổng quantity vượt quá product->quantity
        $totalQuantity = $cart->items()->where('product_id', $request->product_id)->sum('quantity');
        if ($totalQuantity + $request->quantity > $product->quantity) {
            // Trả về thông báo lỗi nếu tổng quantity vượt quá product->quantity
            return response()->json(['error' => 'Số lượng trong giỏ hàng vượt quá số lượng hiện có của sản phẩm'], 400);
        }
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
    public function removeCartItem(CartItem $cart_item)
    {
        // Kiểm tra xem cart_item có thuộc về user hiện tại không
        if ($cart_item->cart->user_id !== Auth::id()) {
            return response()->json(['error' => 'Bạn không có quyền thực hiện thao tác này.'], 403);
        }

        $cart_item->delete();

        return redirect()->route('main.cart.view');
    }


    public function checkout(Request $request)
    {
        $user = Auth::guard($this->guard)->user();

        $cart = Cart::where('user_id', $user->id)->with('items.product')->first();

        // Xử lý logic thanh toán ở đây

        $cart->items()->delete();
        $cart->delete();

        return redirect()->route('main.home');
    }
}