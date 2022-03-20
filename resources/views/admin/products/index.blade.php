@extends('admin.layouts.master')

@section('page-content')

  <div class="container-fluid pt-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card p-3">
          <h3 class="p-1">List of All Products | <a href="{{ route('products.create') }}">Create new Product</a></h3>
          <br>
          @if(session('success'))
            <div class="bg-success text-light p-2">{{ session('success') }}</div>
          @endif
          @if(session('error'))
            <div class="bg-danger text-light p-2">{{ session('error') }}</div>
          @endif
          <table class="table">
            <tr>
              <th>ID</th>
              <th>Image</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Category</th>
              <th>Action</th>
            </tr>
            <tbody>
              @foreach($products as $product)
              <tr>
                <td>#{{ $product->id }}</td>
                <td><img src="{{ asset($product->image) }}" width="120" alt=""></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->slug }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->category_name }}</td>
                <td>
                  <a class="btn btn-primary btn-sm" href="{{ route('products.edit', $product->id) }}">Edit</a>
                  <a class="btn btn-success btn-sm" href="{{ route('products.show', $product->id) }}">Details</a>
                  <form action="{{ route('products.destroy', $product->id) }}" class="d-inline" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection
