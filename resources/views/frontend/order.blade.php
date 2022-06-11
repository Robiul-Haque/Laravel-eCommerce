@section('tittle','Checkout')
@extends('frontend.index')
@section('main')
    <div class="container">
        <div class="row">
            <h3 class="my-2 text-center">Please Checkout!</h3>
            @if (\session()->has('message'))
                <ul class="alert alert-danger" role="alert">
                    <li class="ms-2">{{ \session()->get('message') }}</li>
                </ul>
            @endif
            <div class="col-md-6 px-4">
                <h4 class="my-4 text-center">Your Cart!</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $totalPrice = 0;
                        $totalQty = 0;
                    @endphp
                    @foreach ($carts as $cart)
                        <tr>
                            <td>{{ $cart['product_name'] }}</td>
                            <td>{{ $cart['product_price'] }} <span style="font-size: 20px">৳</span></td>
                            <td>{{ $cart['product_qty'] }}</td>
                            <td>{{ $cart['product_qty'] * $cart['product_price'] }} <span style="font-size: 20px">৳</span></td>
                        </tr>
                        @php
                            $totalPrice = $totalPrice + $cart['product_qty'] * $cart['product_price'];
                            $totalQty = $totalQty + $cart['product_qty'];
                        @endphp
                    @endforeach
                    <tr>
                        <th colspan="2"></th>
                        <th>{{ $totalQty }}</th>
                        <th>{{ $totalPrice }} <span style="font-size: 20px">৳</span></th>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 px-5">
                <h4 class="my-4 text-center">User Information!</h4>
                <form action="{{ route('order') }}" method="post">
                    @csrf
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid     @enderror" name="name" value="{{ auth()->user()->name }}">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ auth()->user()->email }}">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="number" class="form-control @error('phone') is-invalid  @enderror" name="phone" value="{{ auth()->user()->phone }}">
                        @error('phone')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid   @enderror" name="address" value="{{ auth()->user()->address }}">
                        @error('address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="hidden" name="price" value="{{ $totalPrice }}">
                    </div>
                    <div>
                        <input type="hidden" name="qty" value="{{ $totalQty }}">
                    </div>
                    <div class="mb-2">
                        <label for="payment_method" class="form-label">Payment method</label>
                        <select class="form-control @error('select') is-invalid @enderror" name="payment_method">
                            <option value="bkash">Bkash</option>
                            <option value="nagad">Nagad</option>
                            <option value="ucash">Ucash</option>
                            <option value="dbbl">Dbbl</option>
                        </select>
                        @error('select')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="txn_id" class="form-label">Txn id</label>
                        <input type="text" class="form-control @error('txn_id') is-invalid   @enderror" name="txn_id" placeholder="e.g. 6Q8T2z12G7Oa9p3S">
                        @error('txn_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="text-center mb-5">
                        <button type="submit" class="btn btn-primary">Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection