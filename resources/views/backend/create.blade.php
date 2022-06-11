@section('tittle','Create Product')
@extends('backend.index')
@section('main')
  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container" style="width: 45%">
      <h2 class="text-center mb-4">Create New Product</h2>
      <form action="{{ route('admin.product.create') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="ProductName" class="form-label">Product Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
          @error('name')
            <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="ProductPrice" class="form-label">Product Price</label>
          <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}">
          @error('price')
            <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="ProductDesc" class="form-label">Product Description</label>
          <textarea rows="2" class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
          @error('description')
            <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="ProductPhoto" class="form-label">Product Photo</label>
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
  </main>
@endsection