<div class="user-box">
    @auth
        <p class="user-name">{{ auth()->user()->name }}</p>
        <form method="POST" action="/logout">
            @csrf
            <button class="logout-btn" href="/logout">Log Out</button>
        </form>
    @else
        <a class="login-btn" href="/login">Log In</a>
    @endauth
</div>