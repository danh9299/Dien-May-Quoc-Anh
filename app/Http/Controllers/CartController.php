<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
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

    public function showCheckoutForm()
    {
        $user = Auth::guard($this->guard)->user();
        $cart = Cart::where('user_id', $user->id)->with('items.product')->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('main.cart.view');
        }

        return view('main.cart.checkoutform', compact('cart'));
    }






    //Orders

    //Main
    public function viewOrder(Order $order)
    {
        return view('main.orders.view', compact('order'));
    }

    public function allOrders()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id) ->orderBy('created_at', 'desc')->with('items.product')->get();
   
        return view('main.orders.all-orders', compact('orders'));
    }
    public function checkout(Request $request)
    {
        $user = Auth::guard($this->guard)->user();
        $cart = Cart::where('user_id', $user->id)->with('items.product')->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.view')->with('error', 'Giỏ hàng của bạn đang trống.');
        }


      

  
        $order = new Order();
        $order->user_id = $user->id;
        
        $order->total_amount = $cart->items->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
        $order->payment_method = $request->payment_method;
        $order->save();
      


        foreach ($cart->items as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item->product_id;
            $product = $item->product;
            $product->quantity = $product->quantity - $item->quantity;
            $orderItem->quantity = $item->quantity;
            $orderItem->price = $item->product->price;
            $product->save();
            $orderItem->save();
        }

        $cart->items()->delete();
        $cart->delete();

        if ($request->payment_method == 'bank_transfer') {
            // Lấy tổng số tiền cần thanh toán
            $total_amount = $order->total_amount;
    
            // Điều hướng đến trang thanh toán, ví dụ như trang VNPAY
            return view('main.cart.redirect_to_payment', [
                'total_amount' => $total_amount,
                'request_data' => $request->all(),
                'order' => $order, // Có thể cần truyền thêm dữ liệu khác nếu cần thiết
            ]);
        }


        return redirect()->route('main.orders.all-orders')->with('success', 'Đã tạo đơn hàng thành công.');
  
    }

    //Admin
    public function index(){
        $orders = Order::orderBy('updated_at', 'desc')->paginate(10);
        return view('admin.orders.index', ['orders' => $orders]);
    }
    public function show(Order $order)
{
    $order->load('items.product'); // Load thông tin chi tiết sản phẩm trong đơn hàng
    return view('admin.orders.show', compact('order'));
}
public function markAsDelivered($orderId)
{
    $order = Order::findOrFail($orderId);
    
    // Cập nhật trạng thái của đơn hàng thành "Đã giao"
    $order->status = 'Đã giao';
    $order->save();

    return redirect()->route('admin.orders.show', compact('order'))->with('success', 'Đã cập nhật trạng thái đơn hàng thành đã giao.');
}

public function markAsUnDelivered($orderId)
{
    $order = Order::findOrFail($orderId);
    
    // Cập nhật trạng thái của đơn hàng thành "Đã giao"
    $order->status = 'Chưa giao';
    $order->save();

    return redirect()->route('admin.orders.show', compact('order'))->with('success', 'Đã cập nhật trạng thái đơn hàng thành chưa giao.');
}
}