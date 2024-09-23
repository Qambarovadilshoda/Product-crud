<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
</head>
<body>
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}">Create Post</a>
    @foreach ($posts as $post)
        <p><strong>Title</strong>: {{ $post->title }}</p>
        <p><strong>Description</strong>: {{ $post->description }}</p>
        <img src="{{ asset('storage/' . $post->image) }}" width="100" alt="Rasm yo'q">
         <a href="{{ route('posts.edit',$post->id) }}">Edit Post</a>
         <a href="{{ route('posts.show',$post->id) }}">Show Post</a>
         <form action="{{route('posts.destroy',$post->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
         </form>
    @endforeach

</body>
</html>