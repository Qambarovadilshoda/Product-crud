@extends('components.layouts.app')

@section('title', 'Edit Product')

@section('content')

<h1 style="text-align:center;">Edit Product</h1>
<div class="container-fluid py-4">
    <div class="v-50">
        <div class="row" style="margin-left:25%">
            <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="contact-form">
                    <form action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="control-group">
                            <input type="text" class="form-control p-4" name="name" value="{{$product->name}}" required />
                            @error('title')
                            <p class="help-block text-danger">{{ ' * ' . $message }}</p>
                            @enderror
                        </div><br>
                        <div class="control-group">
                            <textarea class="form-control p-4" rows="6" name="description" required> {{$product->description}}</textarea>
                            @error('description')
                            <p class="help-block text-danger">{{ ' * ' . $message }}</p>
                            @enderror
                        </div><br>
                        <div class="control-group">
                            <input class="form-control p-1" type="file" name="image" value="{{$product->image->path}}">
                        </div><br>

                        <div>
                            <button class="btn btn-primary btn-block py-3 px-5" type="submit"">Edit Post</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection