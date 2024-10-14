<div>
    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
<h1>XEXE</h1>
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
