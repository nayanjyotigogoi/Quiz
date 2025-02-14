<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - QuizzyBee</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>

        @if (session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif

        <form action="{{ route('login.process') }}" method="post" class="login-form" id="loginForm">
            @csrf
            <div class="form-group">
                <input type="email" name="email" id="email" placeholder="Email" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" placeholder="Password" required>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="submit-btn">LOG IN</button>
        </form>

        <!-- Forgot Password -->
        <p class="forgot-password">
            <a href="#">Forgot Password?</a>
        </p>

        <!-- Sign Up Link -->
        <p class="signup-text">
            Don't have an account? <a href="{{ route('register') }}">Sign up</a>
        </p>
    </div>
</body>
</html>
