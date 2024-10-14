<div>
    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
<h1>{{auth()->user()->name}}</h1>
<form action="{{route('logout')}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">logout</button>
</form>
<a href="{{ route('products.create') }}">Create</a>
@foreach ($products as $product)
    {{$product->id}}<br>
    {{$product->name}}<br>
    {{$product->description}}<br>
    {{$product->created_at}}<br>
    {{$product->updated_at}}<br>
    {{$product->image?->path}}
    <a href="{{asset("/storage"."/".$product->image?->path)}}">wiew</a>
@endforeach
</div>
