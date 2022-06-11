@section('tittle','Product')
@extends('backend.index')
@section('main')
  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2 class="mb-3 text-center">All Product</h2>
    <a href="{{ route('admin.product.create') }}" class="btn btn-primary mb-3">Create Product</a>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Description</th>
          <th scope="col">Photo</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $key => $product)
        <tr>
          <th scope="row">{{ $key+1 }}</th>
          <td>{{ $product->name }}</td>
          <td>{{ $product->price }} <span style="font-size: 20px">৳</span></td>
          <td>{{ $product->desc }}</td>
          <td>
            <img src="{{ asset('asset/uplode/products/'.$product->photo) }}" alt="{{ $product->photo }}" width="100px">
          </td>
          <td>
            <a href="{{ route('admin.product.edit',$product->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('admin.product.delete',$product->id) }}" class="btn btn-danger">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </main>
@endsection