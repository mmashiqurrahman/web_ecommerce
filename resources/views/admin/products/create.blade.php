@extends('admin.layouts.master')

@section('page-content')

  <div class="container pt-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card p-3">
          <h3 class="p-1">Create a new Product | <a href="{{ route('products.index') }}">Product List</a></h3>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                @if(session('success'))
                  <div class="bg-success text-light p-2">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                  <div class="bg-danger text-light p-2">{{ session('error') }}</div>
                @endif
                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                  @csrf

                  <div class="form-group">
                    <label for="">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control">
                    @error('name')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="">Category ID <span class="text-danger">*</span></label>
                    <select name="category_id" class="form-control">
                      <option value="">--Choose Category--</option>
                      @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                    @error('category_id')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="">Price <span class="text-danger">*</span></label>
                    <input type="text" name="price" class="form-control">
                    @error('price')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="">Quantity <span class="text-danger">*</span></label>
                    <input type="number" name="quantity" class="form-control">
                    @error('quantity')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control">
                    @error('image')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control"></textarea>
                    @error('description')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" class="form-control">
                      <option value="1">Enabled</option>
                      <option value="0">Disabled</option>
                    </select>
                    @error('status')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <button class="btn btn-primary">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
