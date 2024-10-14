<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        @error('email')
            {{ $message}}
        @enderror
        <input type="email" name="email" placeholder="User Email"> <br>
        <input type="password" name="password" placeholder="User Password"> <br>
        <input type="submit" value="Submit">
    </form>
    <a href="{{route('registerForm')}}">Register</a>


</body>
</html>