@extends('admin.layouts.master')

@section('page-content')

    <div class="container pt-4">
        <div class="card mt-3" style="border: 1px solid #0077bb;">
            <div class="row">
            <div class="col-md-6">
                <img width="100%" class="card-img-top" src="{{ asset($product->image) }}" alt="Image">
            </div>
            <div class="col-md-6">
                <div style="padding: 2rem 3rem 2rem 1.5rem">
                    <h2>{{ $product->name }}</h2>
                    <h4 class="text-danger">{{ $product->price }} Taka</h4>
                    <hr class="mt-0 mb-1">
                    <p><span style="color: #bb0088;">Description:</span> Some representative
                    placeholder content for the three columns of text below the carousel.
                    This is the first column. Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.</p>
                    <br><hr>
                    <h4 class="text-secondary">Back to: <a href="{{ route('products.index') }}" class="text-primary">
                        All Products</a> | <a href="/" class="text-primary">Home Page</a></h4>
                </div>
            </div>
        </div>
        </div>
    </div>

@endsection
