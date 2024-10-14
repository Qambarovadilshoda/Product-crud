@extends('components.layouts.app')
@section('title', 'Home Page')


@section('content')


<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">{{'Hi, '. auth()->user()->name . ' !'}}</h1>
            <p class="lead text-body-secondary">If you want to add your own product, use the button below.</p>
            @if (auth()->check())
            <p>
                <a href="{{route('products.create')}}" class="btn btn-primary my-2">Create New Product</a>
            </p>
            @endif
        </div>
    </div>
</section>
<div class="album py-5 bg-body-tertiary">

    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($products as $product)
            <div class="col">
                <div class="card shadow-sm">
                    <img src="{{asset('/storage' . '/' . $product->image->path)}}" class="bd-placeholder-img card-img-top" width="100%" height="220" alt="no">
                    <div class="card-body">
                        <h4>{{$product->name}}</h4>
                        <p class="card-text">{{$product->description}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{route('products.show', $product->id)}}" class="btn btn-sm btn-outline-secondary">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
{{$products->links()}}
<div>
</div>

@endsection