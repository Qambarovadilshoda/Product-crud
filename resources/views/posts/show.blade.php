<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post Show</title>
</head>
<body>
    <p><strong>Id</strong>: {{ $post->id }}</p>
    <p><strong>Title</strong>: {{ $post->title }}</p>
    <p><strong>Description</strong>: {{ $post->description }}</p>
    <p><strong>Created At</strong>: {{ $post->created_at }}</p>
     <a href="{{ route('posts.edit',$post->id) }}">Edit Post</a>
     <form action="{{route('posts.destroy',$post->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
     </form>
</body>
</html>