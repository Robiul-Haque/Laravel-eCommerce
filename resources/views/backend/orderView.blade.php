@section('tittle','Order Details')
@extends('backend.index')
@section('main')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-3">
        <h2 class="text-center">Order Details</h2>
        <div class="card mx-md-4">
            <div class="card-body">
                <div class="col-md-12">
                    <div class="container">
                        <div class="row">
                            <ul class="col-md-6 list-unstyled">
                                <li><b>Name:</b> {{ $order->name }}</li>
                                <li><b>Email:</b> {{ $order->email }}</li>
                                <li><b>Phone:</b> {{ $order->phone }}</li>
                                <li><b>Address:</b> {{ $order->address }}</li>
                                <a class="btn btn-primary mt-2" href="{{ route('admin.orderIndex') }}">Back To Order</a>
                            </ul>
                            <ul class="col-md-6 list-unstyled">
                                <li><b>Status:</b> {{ $order->status }}</li>
                                <li><b>Payment Method:</b> {{ $order->payment_method }}</li>
                                <li><b>Txn ID:</b> {{ $order->txn_id }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card m-md-1">
                        <table class="table table-striped table-hover text-center">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderDetails as $orderDetail)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $orderDetail->name }}</td>
                                        <td>{{ $orderDetail->qty }}</td>
                                        <td>{{ $orderDetail->price }} <span style="font-size: 20px">৳</span></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3"></td>
                                    <td><h5>Total: {{ $order->price }} <span style="font-size: 20px">৳</span></h5></td>
                                </tr>
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection