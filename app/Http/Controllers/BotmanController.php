<?php
namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use App\Models\Product;
use App\Models\Footer;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');


        $botman->hears('{message}', function ($botman, $message) {
            $message = strtolower($botman->getMessage()->getText());
            if (strpos($message, 'chào') !== false) {
                $botman->reply("Rất vui được gặp bạn! Tôi giúp gì được bạn?");
            } else if (strpos($message, 'địa chỉ') !== false) {
                $botman->reply("Tổng kho ở 158 Phan Trọng Tuệ, Thanh Liệt, Thanh Trì, Hà Nội");
            } 
            else if (strpos($message,'web') !== false){
                $botman->reply("Bạn muốn làm web, liên hệ email: nguyenduyanh.tit@gmail.com");
            } 
            else if (strpos($message,'giám đốc') !== false){
                $botman->reply("Giám đốc của công ty là: Nguyễn Trọng Cơ");
            } 
            else if (strpos($message,'sếp') !== false){
                $botman->reply("Giám đốc của công ty là: Nguyễn Trọng Cơ");
            } 
            else if (strpos($message,'fanpage') !== false){
                $fb = Footer::all()->first();
                $botman->reply("Facebook của công ty là:");
                $botman->reply($fb->link_facebook);
             
            } 
            else if (strpos($message,'instagram') !== false){
                $fb = Footer::all()->first();
                $botman->reply("Instagram của công ty là:");
                $botman->reply($fb->link_instagram);
             
            } 
            else if (strpos($message,'ig') !== false){
                $fb = Footer::all()->first();
                $botman->reply("Instagram của công ty là:");
                $botman->reply($fb->link_instagram);
             
            } 
            else if (strpos($message,'tiktok') !== false){
                $fb = Footer::all()->first();
                $botman->reply("Tiktok của công ty là:");
                $botman->reply($fb->link_tiktok);
             
            } 
            else if (strpos($message,'facebook') !== false){
                $fb = Footer::all()->first();
                $botman->reply("Facebook của công ty là:");
                $botman->reply($fb->link_facebook);
             
            } 
            else if (strpos($message,'hotline') !== false){
                $hotline = Footer::all()->first();
                $botman->reply("Bạn gọi 1 trong 4 số sau nhé:");
                $botman->reply($hotline->hotline1);
                $botman->reply($hotline->hotline2);
                $botman->reply($hotline->hotline3);
                $botman->reply($hotline->hotline4);
            } 
            else if (strpos($message,'số') !== false){
                $hotline = Footer::all()->first();
                $botman->reply("Bạn gọi 1 trong 4 số sau nhé:");
                $botman->reply($hotline->hotline1);
                $botman->reply($hotline->hotline2);
                $botman->reply($hotline->hotline3);
                $botman->reply($hotline->hotline4);
            } 
            else if (strpos($message,'điện thoại') !== false){
                $hotline = Footer::all()->first();
                $botman->reply("Bạn gọi 1 trong 4 số sau nhé:");
                $botman->reply($hotline->hotline1);
                $botman->reply($hotline->hotline2);
                $botman->reply($hotline->hotline3);
                $botman->reply($hotline->hotline4);
            } 
            else if (strpos($message,'email') !== false){
                $email = Footer::all()->first();
                $botman->reply("Địa chỉ email của công ty là: ".$email->email);
               
            } 
            else if (strpos($message,'làm') !== false){
                $botman->reply("Điện Máy Quốc Anh làm việc tất cả các ngày trong tuần. Từ 8:30 đến 17:30.");
               
            } 
            else if (strpos($message,'giờ') !== false){
                $botman->reply("Điện Máy Quốc Anh làm việc tất cả các ngày trong tuần. Từ 8:30 đến 17:30.");
               
            } 
            else if (strpos($message,'thời gian') !== false){
                $botman->reply("Điện Máy Quốc Anh làm việc tất cả các ngày trong tuần. Từ 8:30 đến 17:30.");
               
            } 
           
            else if (strpos($message, 'tủ lạnh') !== false) {
                $products = Product::where('name', 'like', '%tủ lạnh%')
                    ->orderBy('updated_at', 'desc')->limit(3)->get();

                // Nếu tìm thấy sản phẩm
                if ($products->isNotEmpty()) {
                    
                    $botman->reply("Top tủ lạnh tôi khuyên bạn nên mua: ");
                    
                   $count = 1;
                    foreach ($products as $product) {
                        $modelName = $product->name;
                        $str = $count . ". " . $modelName;
                        $botman->reply($str);
                        $count = $count + 1;
                    }
                    $count = 0;
                    $botman->reply("Lưu ý, đây là hệ thống trả lời tự động. Nếu bạn cần tư vấn kĩ hơn vui lòng liên hệ theo số hotline!");
                } else {
                    $botman->reply("Hiện chúng tôi đang cập nhật thêm sản phẩm tủ lạnh. Bạn liên hệ hotline để được tư vấn nhé!");
                }
            }
            else if (strpos($message, 'tivi') !== false) {
                $products = Product::where('name', 'like', '%tivi%')
                    ->orderBy('updated_at', 'desc')->limit(3)->get();

                // Nếu tìm thấy sản phẩm
                if ($products->isNotEmpty()) {
                    
                    $botman->reply("Top tivi tôi khuyên bạn nên mua: ");
                    
                   $count = 1;
                    foreach ($products as $product) {
                        $modelName = $product->name;
                        $str = $count . ". " . $modelName;
                        $botman->reply($str);
                        $count = $count + 1;
                    }
                    $count = 0;
                    $botman->reply("Lưu ý, đây là hệ thống trả lời tự động. Nếu bạn cần tư vấn kĩ hơn vui lòng liên hệ theo số hotline!");
                } else {
                    $botman->reply("Hiện chúng tôi đang cập nhật thêm sản phẩm tivi. Bạn liên hệ hotline để được tư vấn nhé!");
                }
            }
            else if (strpos($message, 'điều hòa') !== false) {
                $products = Product::where('name', 'like', '%điều hòa%')
                    ->orderBy('updated_at', 'desc')->limit(3)->get();

                // Nếu tìm thấy sản phẩm
                if ($products->isNotEmpty()) {
                    
                    $botman->reply("Top điều hòa tôi khuyên bạn nên mua: ");
                    
                   $count = 1;
                    foreach ($products as $product) {
                        $modelName = $product->name;
                        $str = $count . ". " . $modelName;
                        $botman->reply($str);
                        $count = $count + 1;
                    }
                    $count = 0;
                    $botman->reply("Lưu ý, đây là hệ thống trả lời tự động. Nếu bạn cần tư vấn kĩ hơn vui lòng liên hệ theo số hotline!");
                } else {
                    $botman->reply("Hiện chúng tôi đang cập nhật thêm sản phẩm điều hòa. Bạn liên hệ hotline để được tư vấn nhé!");
                }
            }
            else if (strpos($message, 'máy giặt') !== false) {
                $products = Product::where('name', 'like', '%máy giặt%')
                    ->orderBy('updated_at', 'desc')->limit(3)->get();

                // Nếu tìm thấy sản phẩm
                if ($products->isNotEmpty()) {
                    
                    $botman->reply("Top máy giặt tôi khuyên bạn nên mua: ");
                    
                   $count = 1;
                    foreach ($products as $product) {
                        $modelName = $product->name;
                        $str = $count . ". " . $modelName;
                        $botman->reply($str);
                        $count = $count + 1;
                    }
                    $count = 0;
                    $botman->reply("Lưu ý, đây là hệ thống trả lời tự động. Nếu bạn cần tư vấn kĩ hơn vui lòng liên hệ theo số hotline!");
                } else {
                    $botman->reply("Hiện chúng tôi đang cập nhật thêm sản phẩm máy giặt. Bạn liên hệ hotline để được tư vấn nhé!");
                }
            }
            else if (strpos($message, 'tủ đông') !== false) {
                $products = Product::where('name', 'like', '%tủ đông%')
                    ->orderBy('updated_at', 'desc')->limit(3)->get();

                // Nếu tìm thấy sản phẩm
                if ($products->isNotEmpty()) {
                    
                    $botman->reply("Top tủ đông tôi khuyên bạn nên mua: ");
                    
                   $count = 1;
                    foreach ($products as $product) {
                        $modelName = $product->name;
                        $str = $count . ". " . $modelName;
                        $botman->reply($str);
                        $count = $count + 1;
                    }
                    $count = 0;
                    $botman->reply("Lưu ý, đây là hệ thống trả lời tự động. Nếu bạn cần tư vấn kĩ hơn vui lòng liên hệ theo số hotline!");
                } else {
                    $botman->reply("Hiện chúng tôi đang cập nhật thêm sản phẩm tủ đông. Bạn liên hệ hotline để được tư vấn nhé!");
                }
            }
            else if (strpos($message, 'loa') !== false) {
                $products = Product::where('name', 'like', '%loa%')
                    ->orderBy('updated_at', 'desc')->limit(3)->get();

                // Nếu tìm thấy sản phẩm
                if ($products->isNotEmpty()) {
                    
                    $botman->reply("Top sản phẩm loa tôi khuyên bạn nên mua: ");
                    
                   $count = 1;
                    foreach ($products as $product) {
                        $modelName = $product->name;
                        $str = $count . ". " . $modelName;
                        $botman->reply($str);
                        $count = $count + 1;
                    }
                    $count = 0;
                    $botman->reply("Lưu ý, đây là hệ thống trả lời tự động. Nếu bạn cần tư vấn kĩ hơn vui lòng liên hệ theo số hotline!");
                } else {
                    $botman->reply("Hiện chúng tôi đang cập nhật thêm sản phẩm loa. Bạn liên hệ hotline để được tư vấn nhé!");
                }
            }
            else {
                $botman->reply("Vui lòng gọi điện tới hotline để được tư vấn thêm bạn nhé!");
            }

        });



        $botman->listen();
    }

    /**
     * Place your BotMan logic here.
     */

}