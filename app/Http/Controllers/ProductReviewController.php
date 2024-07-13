<?php

namespace App\Http\Controllers;

use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    //
    public function store(Request $request)
    {

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'comment' => 'required',

        ]);

        ProductReview::create($request->all());

        return back()->with('success', 'Đã nhận xét sản phẩm!');
    }

}
