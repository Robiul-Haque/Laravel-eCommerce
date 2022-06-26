<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function orderIndex()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        return view('backend.order', compact('orders'));
    }

    public function orderView($id)
    {
        $order = Order::where('id', $id)->first();
        $order->find($id)->update(['seen_status' => '1']);
        $orderDetails = OrderDetails::where('order_id', $id)->get();
        return view('backend.orderView', compact('order', 'orderDetails'));
    }

    public function orderStatus(Request $req, $id)
    {
        Order::find($id)->update([
            'status' => $req->status
        ]);
        return redirect()->back();
    }

    public function orderDelete($id)
    {
        Order::find($id)->delete();
        Session::flash('message', 'Order Delete sucessfully');
        return redirect()->back();
    }
}
