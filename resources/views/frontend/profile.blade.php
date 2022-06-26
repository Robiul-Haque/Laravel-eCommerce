@section('tittle','Profile')
@extends('frontend.index')
@section('main')
    <div class="container">
        <h2 class="text-center mb-1 mt-2">User Profile</h2>
        <div class="row mb-5">
            <div class="col-md-6">
                <div style="width: 72%; margin-left: 14%">
                    <form action="{{ route('profile') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 text-center">
                            <img src="{{ asset('asset/uplode/users/'.auth()->user()->photo) }}" alt="{{ auth()->user()->photo }}" style="width: 23%; border-radius: 50%;" class="border border-2 border-info">
                        </div>
                        @if (\session()->has('message'))
                            <ul class="alert alert-success text-message" role="alert">
                                <li class="ms-2">{{ \session()->get('message') }}</li>
                            </ul>
                        @endif
                        <div class="mb-2">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ auth()->user()->name }}">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ auth()->user()->email }}" readonly>
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ auth()->user()->phone }}">
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ auth()->user()->address }}">
                            @error('address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo">
                            @error('photo')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <table class="table mt-5 text-center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th scope="col">Order date</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $order)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $order->created_at->format('d M, Y') }}</td>
                            <td>{{ $order->qty}}</td>
                            <td>{{ $order->price}}</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                <a class="btn btn-primary mx-1" href="{{ route('order.show',$order->id) }}">View</a>
                                {{-- <a class="btn btn-info mx-1" href="{{ route('order.invoice',$order->id) }}" target="_blank">Invoice</a> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a class="btn btn-primary mt-3" href="{{ route('home') }}">Go To Home</a>
            </div>
        </div>
    </div>
@endsection