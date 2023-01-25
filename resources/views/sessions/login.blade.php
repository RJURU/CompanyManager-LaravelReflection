<x-layout>
    <main id="login">
        <div class="login-container">
            <div class="title">
                <h1>LOGIN</h1>
            </div>
            <form method="POST" action="/login" class="login-form">
                @csrf

                <div class="input_container">
                    <label for="email" class="label">Email</label>
                    <input class="input" type="email" name="email" id="email" value="{{ old('email') }}" required>
                    @error('email')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input_container">
                    <label for="password" class="label">Password</label>
                    <input class="input" type="password" name="password" id="password" value="{{ old('password') }}" required>
                    @error('password')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="login-btn_container">
                    <button type="submit" class="login_btn">Log In</button>
                </div>
            </form>
        </div>
    </main>
</x-layout>