@section('tittle','Cart')
@extends('frontend.index')
@section('main')
  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6 mb-4">
        <h3 class="text-center my-4">Your Cart</h3>
        <table class="table mb-5">
          <thead>
            <tr>
              <th scope="col">Product Name</th>
              <th scope="col">Price</th>
              <th scope="col">Qty</th>
              <th scope="col">Total</th>
              <th scope="col">Action</th>
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
                <td><a class="btn btn-danger" href="{{ route('cart.delete',$cart['product_id']) }}">Delete</a></td>
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
              <th></th>
            </tr>
          </tbody>
        </table>
        @if (count($carts)>0)
          <a href="{{ route('checkout') }}" class="btn btn-primary mb-5">Checkout</a>
        @else
        <a href="{{ route('home') }}" class="btn btn-light mb-5">Continue To Shoping</a>
        @endif
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
@endsection