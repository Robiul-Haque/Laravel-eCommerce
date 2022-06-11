<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\product;

class FrontendController extends Controller
{
    public function home()
    {
        $products = Product::paginate(12);
        return view('frontend.home', compact('products'));
    }
}
