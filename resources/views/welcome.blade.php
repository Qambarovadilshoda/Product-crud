@if (auth()->check())
    
{{ auth()->user()->name }}

<form action="{{ route('logout') }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Log Out</button>
</form>
@else
<a href="{{ route('registerForm') }}">Register</a> <br>
<a href="{{ route('loginForm') }}">if you have an account</a>
@endif

