@section('tittle','Update Password')
@extends('auth.index')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="margin: 10% auto;">
            <h3 class="text-center mb-4 mt-2">New Password</h3>
            <form action="{{ route('update.password',$token) }}" method="post">
            @csrf
            <div class="mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your password">
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Confirm password">
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
            <div class="col-md-4"></div>
        </div>
    </div>
@endsection