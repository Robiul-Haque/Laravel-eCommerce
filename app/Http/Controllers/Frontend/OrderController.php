<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function checkout()
    {
        $carts = \session()->has('cart') ? \session()->get('cart') : [];
        return view('frontend.order', compact('carts'));
    }

    public function order(Request $req)
    {
        try {
            $validate = Validator::make($req->all(), [
                'name' => 'required|max:30',
                'email' => 'required|email',
                'phone' => 'required|max:20',
                'address' => 'required|min:10|max:200',
                'price' => 'required',
                'qty' => 'required',
                'payment_method' => 'required',
                'txn_id' => 'required'
            ]);
            if ($validate->fails()) {
                return redirect()->back()->withInput()->withErrors($validate->getMessageBag());
            }
            $inputs = [
                'user_id' => auth()->user()->id,
                'name' => $req->input('name'),
                'email' => $req->input('email'),
                'phone' => $req->input('phone'),
                'address' => $req->input('address'),
                'price' => $req->input('price'),
                'qty' => $req->input('qty'),
                'payment_method' => $req->input('payment_method'),
                'txn_id' => $req->input('txn_id')
            ];
            DB::beginTransaction();
            if (Order::where('txn_id', '=', $req->input('txn_id'))->first()) {
                Session::flash('message', 'Please give a unique transaction id or try again to it correctly and then order');
                return redirect()->back();
            } else {
                $order = Order::create($inputs);
                $carts = \session()->has('cart') ? \session()->get('cart') : [];
                foreach ($carts as $cart) {
                    OrderDetails::create([
                        'order_id' => $order->id,
                        'product_id' => $cart['product_id'],
                        'name' => $cart['product_name'],
                        'price' => $cart['product_price'],
                        'qty' => $cart['product_qty']
                    ]);
                }
            }
            \session()->forget('cart');
            DB::commit();
            Session::flash('message', 'Order create successfully');
            return redirect()->route('profile');
        } catch (\Exception $throw) {
            DB::rollBack();
            Session::flash('message', $throw->getMessage());
            return redirect()->route('order');
        }
    }

    public function show($id)
    {
        $order = Order::where('id', $id)->with('orderDetails')->first();
        return view('frontend.order_details', compact('order'));
    }
}
