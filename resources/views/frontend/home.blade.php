@section('tittle','Home')
@extends('frontend.index')
@section('main')
  <main>
    <section class="text-center container">
      <div class="row py-lg-3">
        <div class="col-lg-6 col-md-8 mx-auto">
          <p>
            <a href="{{ route('cart') }}" class="btn btn-primary my-2">View Cart</a>
          </p>
          @if (\session()->has('message'))
            <p class="alert alert-success text-message" role="alert">{{ \session()->get('message') }}</p>
          @endif
        </div>
      </div>
    </section>
    <div class="album py-4 bg-light">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          @foreach ($products as $product)
          <div class="col">
            <div class="card shadow-sm">
              {{-- <img src="{{ asset('asset/uplode/products/'.$product->photo) }}" alt="" height="220px"> --}}
              <img src="{{ $product->photo }}" alt="$product->name" height="220px">
              <div class="card-body">
                <p><b>{{ $product->name }}</b></p>
                <p class="card-text">{{ $product->desc }}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="{{ route('add.cart',$product->id) }}" class="btn btn-sm btn-outline-secondary">Add to Cart</a>
                  </div>
                  <small class="text-muted">{{ $product->price }} <span style="font-size: 20px">৳</span></small>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <br>
          {{ $products->links() }}
      </div>
    </div>
  </main>
@endsection