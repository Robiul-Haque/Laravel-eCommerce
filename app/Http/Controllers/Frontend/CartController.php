<?php

namespace App\Http\Controllers\Frontend;


use App\Models\product;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addCart($id)
    {
        $product = Product::find($id);
        $cart = \session()->has('cart') ? \session()->get('cart') : [];
        if (key_exists($product->id, $cart)) {
            $cart[$product->id]['product_qty'] = $cart[$product->id]['product_qty'] + 1;
        } else {
            $cart[$product->id] = [
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'product_qty' => 1,
            ];
        }
        $cart = \session(['cart' => $cart]);
        Session::flash('message', 'Product add to cart');
        return redirect()->route('home');
    }

    public function cart()
    {
        $carts = \session()->has('cart') ? \session()->get('cart') : [];
        return view('frontend.cart', compact('carts'));
    }

    public function cartDelete($id)
    {
        $carts = \session()->has('cart') ? \session()->get('cart') : [];
        foreach ($carts as $key => $cart) {
            if ($cart['product_id'] == $id) {
                unset($carts[$key]);
            }
            \session(['cart' => $carts]);
        }
        Toastr::success('Product delete successfull', 'Delete', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }
}
