    
{{ auth()->user()->name }}

<form action="{{ route('logout') }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Log Out</button>
</form>

