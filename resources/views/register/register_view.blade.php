<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>

    <div class="register-container">
        <h2>Sign Up</h2>
        <p>Create an account to get started</p>

        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        @if ($errors->any())
            <div style="color: red;">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('register.submit') }}" method="POST">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter a strong password" required>
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Re-enter password" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="submit-btn">Register</button>
        </form>

        <!-- Login Link -->
        <p class="signup-text">Already have an account? <a href="{{ route('login') }}">Login here</a></p>
    </div>

</body>
</html>
