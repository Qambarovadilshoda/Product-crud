<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>

    <form action="{{ route('register') }}" method="POST">
        @csrf
        @error('name')
            {{ $message}}
        @enderror
        <input type="text" name="name" placeholder="User Name"> <br>
        @error('email')
            {{ $message}}
        @enderror
        <input type="email" name="email" placeholder="User Email"> <br>
        @error('age')
            {{ $message}}
        @enderror
        <input type="number" name="age" placeholder="User Age"> <br>
        @error('password')
            {{ $message}}
        @enderror
        <input type="password" name="password" placeholder="User Password"> <br>
        <input type="submit" value="Submit">
    </form>
    <a href="{{route('loginForm')}}">login</a>
</body>
</html>