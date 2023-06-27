<form method="POST" action="{{ route('login') }}">
    @csrf

        <div>
            Email:<input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div>
            Password:<input id="password" type="password" name="password" required>
        </div>

        <div>
            <button type="submit">
               Login
            </button>
        </div>
       
</form>
<div>
    <form action="{{route('signup')}}" method="Get">
        <button type="submit">Sign Up</button>
    </form>
</div>
