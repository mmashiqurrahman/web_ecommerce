@extends('admin.layouts.master')

@section('page-content')

  <div class="container pt-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card p-3">
          <h3 class="p-1">Create a new Category | <a href="{{ route('categories.index') }}">Category List</a></h3>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                @if(session('success'))
                  <div class="bg-success text-light p-2">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                  <div class="bg-danger text-light p-2">{{ session('error') }}</div>
                @endif
                <form action="{{ route('categories.store') }}" method="post">
                  @csrf
                  <div class="form-group">
                    <label for="">Category Name</label>
                    <input type="text" name="name" class="form-control">
                    @error('name')
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
