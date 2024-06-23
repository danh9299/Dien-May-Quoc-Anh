<!-- resources/views/main/cart/redirect_to_payment.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting...</title>
</head>
<body>
    <form id="redirect-form" action="{{ route('main.vnpay_payment') }}" method="POST">
        @csrf
        <input type="hidden" name="total_amount" value="{{ $total_amount }}">
        
        @if ($order)
            <!-- Thông tin đơn hàng -->
            <input type="hidden" name="order_id" value="{{ $order->id }}">
            <input type="hidden" name="order_total_amount" value="{{ $order->total_amount }}">
            <!-- Các thông tin khác của đơn hàng nếu cần -->
        @endif
        
        @foreach ($request_data as $key => $value)
            @if (is_array($value))
                @foreach ($value as $subKey => $subValue)
                    <input type="hidden" name="{{ $key }}[{{ $subKey }}]" value="{{ $subValue }}">
                @endforeach
            @else
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endif
        @endforeach
    </form>

    <script>
        document.getElementById('redirect-form').submit();
    </script>
</body>
</html>
