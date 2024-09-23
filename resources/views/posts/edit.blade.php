<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post Create</title>
</head>

<body>

    <form action="{{ route('posts.update',$post->id) }}" method="POST">
        @csrf
        @method('put')
        @error('title')
            {{ $message }}
        @enderror
        <input type="text" name="title" placeholder="Title" value="{{ $post->title }}">
        @error('description')
            {{ $message }}
        @enderror
        <textarea name="description" cols="30" rows="10" placeholder="Description">
            {{$post->description}}
        </textarea>
        <input type="submit" value="Submit">
    </form>

</body>

</html>
