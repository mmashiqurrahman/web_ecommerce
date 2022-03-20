@extends('admin.layouts.master')

@section('page-content')

  <div class="container pt-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card p-3">
          <h3 class="p-1">List of Categories | <a href="{{ route('categories.create') }}">Create new Category</a></h3>
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
              <th>Name</th>
              <th>Slug</th>
              <th>Action</th>
            </tr>
            <tbody>
              @foreach($categories as $category)
              <tr>
                <td>#{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>
                  <a class="btn btn-primary btn-sm" href="{{ route('categories.edit', $category->id) }}">Edit</a>
                  <form action="{{ route('categories.destroy', $category->id) }}" class="d-inline" method="post">
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
