@section('tittle','Login')
@extends('auth.index')
@section('main')
    <main style="width: 30%; margin: 8% auto;">
        <h2 class="text-center mb-4">Please Login</h2>
        @if (\session()->has('loginMessage'))
            <ul class="alert alert-danger" role="alert">
                <li class="ms-2">{{ \session()->get('loginMessage') }}</li>
            </ul>
        @endif
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="mb-4">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-1">
                <input type="password" class="form-control  @error('email') is-invalid @enderror" name="password" placeholder="Password">
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <a class="text-primary text-decoration-none" href="{{ route('forgot.password') }}">Forgot password</a>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mt-2">Log-In</button>
            </div>
        </form>
    </main>
@endsection