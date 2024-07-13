<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class PaymentController extends Controller
{


    //
    public function vnpay_payment(Request $request)
    {

        $total_amount = $request->input('total_amount');
        $order_id = $request->input('order_id');

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('main.vnpay_return');
        $vnp_TmnCode = "K6CG97BJ";//Mã website tại VNPAY 
        $vnp_HashSecret = "WVB1NO7WLF8BYLTDE4OO6A88CVKQ3NSX"; //Chuỗi bí mật

        $vnp_TxnRef = $order_id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán đơn hàng' . $order_id;
        $vnp_OrderType = 'Điện Máy Quốc Anh';
        $vnp_Amount = $total_amount * 100;
        $vnp_Locale = 'VN';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,

        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00'
            ,
            'message' => 'success'
            ,
            'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo
        return redirect()->away($vnp_Url);
    }



    public function vnpayReturn(Request $request)
    {
        // Kiểm tra xác thực phản hồi từ VNPAY (nếu cần)
        // Xử lý dữ liệu nhận được từ VNPAY
        $vnp_ResponseCode = $request->get('vnp_ResponseCode');
        $vnp_TxnRef = $request->get('vnp_TxnRef'); // Mã đơn hàng trong hệ thống của bạn
        $vnp_Amount = $request->get('vnp_Amount');

        // Tìm đơn hàng tương ứng trong cơ sở dữ liệu
        $order = Order::where('id', $vnp_TxnRef)->first();

        if (!$order) {
            return redirect()->route('home')->with('error', 'Không tìm thấy đơn hàng.');
        }

        // Kiểm tra trạng thái phản hồi từ VNPAY
        if ($vnp_ResponseCode == '00') {
            // Cập nhật trạng thái thanh toán của đơn hàng thành công
            $order->payment_status = 'Đã thanh toán';
            $order->save();

            // Xử lý các công việc khác sau khi thanh toán thành công (vd: gửi email xác nhận)
            // $this->sendPaymentConfirmationEmail($order);

            return redirect()->route('main.orders.view', ['order' => $order])->with('success', 'Đã thanh toán thành công.');
        } else {
            // Xử lý trường hợp thanh toán thất bại
            return redirect()->route('main.orders.view', ['order' => $order])->with('error', 'Thanh toán thất bại.');
        }
    }
}
