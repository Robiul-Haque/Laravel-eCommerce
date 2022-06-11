@section('tittle','Register')
@extends('frontend.index')
@section('main')
  <div class="container" style="width: 35%">
    <h2 class="text-center mb-4 mt-2">Regester!</h2>
    @if (\session()->has('message'))
      <ul class="alert alert-success text-message" role="alert">
        <li class="ms-2">{{ \session()->get('message') }}</li>
      </ul>
    @endif
    <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name">
        @error('name')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3">
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">
        @error('email')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3">
        <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Phone">
        @error('phone')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3">
        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Address">
        @error('address')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3">
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
        @error('password')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3">
        <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo">
        @error('photo')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection