@section('tittle','Order Details')
@extends('frontend.index')
@section('main')
    <div class="container">
        <div class="row">
            <h2 class="text-center mt-2">Order Details</h2>
            <div class="col-md-6">
                <h3 class="text-center my-3">Customer Information</h3>
                <p><b>Customer name:</b> {{ $order->name }}</p>
                <p><b>Email address:</b> {{ $order->email }}</p>
                <p><b>Phone number:</b> {{ $order->phone }}</p>
                <p><b>Address:</b> {{ $order->address }}</p>
                <p><b>Product price:</b> {{ $order->price }}</p>
                <p><b>Qty:</b> {{ $order->qty }}</p>
                <p><b>Order status:</b> {{ $order->status }}</p>
                <p><b>Payment_method:</b> {{ $order->name }}</p>
                <p><b>Txn ID:</b> {{ $order->txn_id }}</p>
            </div>
            <div class="col-md-6">
                <h3 class="text-center my-3">Product Information</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product name</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderDetails as $details)
                            <tr>
                                <td>{{ $details->name }}</td>
                                <td>{{ $details->qty }}</td>
                                <td>{{ $details->price }} <span style="font-size: 20px">৳</span></td>
                                <td>{{ $details->price * $details->qty  }} <span style="font-size: 20px">৳</span></td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3"></td>
                            <th>{{ $order->price }} <span style="font-size: 20px">৳</span></th>
                        </tr>
                    </tbody>
                </table>
                <a class="btn btn-primary mt-3" href="{{ route('profile') }}">Back To Profile</a>
            </div>
        </div>
    </div>
@endsection