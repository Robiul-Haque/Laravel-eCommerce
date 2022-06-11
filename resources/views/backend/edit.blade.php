@section('tittle','Product Edit')
@extends('backend.index')
@section('main')
  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container" style="width: 45%">
    <h2 class="text-center mb-3">Edit Product</h2>
    <form action="{{ route('admin.product.edit',$product->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="ProductName" class="form-label">Product Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}">
        @error('name')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="ProductPrice" class="form-label">Product Price</label>
        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}">
        @error('price')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="ProductDesc" class="form-label">Product Description</label>
        <textarea rows="2" class="form-control @error('description') is-invalid @enderror" name="description">{{ $product->desc }}</textarea>
        @error('description')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-1">
        <label for="ProductPhoto" class="form-label">Product Photo</label>
        <input type="file" class="form-control" name="photo">
      </div>
      <div class="mb-3">
        <img src="{{ asset('asset/uplode/products/'.$product->photo) }}" alt="{{ $product->photo }}" width="100px" class="border">
        @error('name')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
  </main>
@endsection