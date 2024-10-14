@extends('components.layouts.app')

@section('title', 'Product')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="mb-5 text-center">
                <h1 class="section-title mb-3 text-dark font-weight-bold">{{$product->name}}</h1>
                <p class="text-muted">{{$product->created_at->format('F j, Y')}}</p>
            </div>
            <div class="mb-5">
                <img src="{{ asset('storage/' . $product->image->path) }}" class="img-fluid rounded shadow-lg w-100 mb-4" alt="Product Image">
                <p class="text-justify text-secondary">{{$product->description}}</p>

                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-secondary btn-sm mr-2" href="{{route('products.edit', $product->id)}}">Edit</a>
                    <form action="{{route('products.destroy', $product->id)}}" method="POST" onSubmit="return confirm('Are you sure you wish to delete?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection