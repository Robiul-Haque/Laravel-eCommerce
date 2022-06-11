@section('tittle','Forgot Password')
@extends('auth.index')
@section('main')
  <div class="container">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" style="margin: 10% auto;">
        <h2 class="text-center mb-4 mt-2">Your Email</h2>
        @if (\session()->has('forgotPassMessage'))
          <p class="alert alert-success" role="alert">{{ \session()->get('forgotPassMessage') }}</p>
        @endif
        <form action="{{ route('forgot.password') }}" method="post">
          @csrf
          <div class="mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Your email">
            @error('email')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
        <div class="col-md-4"></div>
    </div>
  </div>
@endsection