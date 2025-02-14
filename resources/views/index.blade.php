@extends('layouts.layout')

@section('title', 'Welcome to QuizzyBee')

@section('content')
    <main>
        <div class="home-container">
            <div class="floating-elements-container">
                <!-- Floating Elements -->
                <div class="floating-element">❓</div>
                <div class="floating-element">⭐</div>
                <div class="floating-element">🎯</div>
                <div class="floating-element">💡</div>
                <div class="floating-element">📜</div>
            </div>

            <section class="hero">
                <h1 class="floating-text">Welcome to the Ultimate Quiz!</h1>
                <p class="floating-text">Challenge yourself, have fun, and learn something new!</p>
                <button id="start-btn" onclick="window.location.href='{{ url('/login') }}'">Start Quiz</button>
            </section>

            <!-- Login & Register Section -->
            <!-- <section class="auth-section">
                @guest
                    <h2>Join QuizzyBee Today!</h2>
                    <p>Create an account to track your progress and compete on the leaderboard.</p>
                    <div class="auth-buttons">
                        <a href="{{ url('/login') }}" class="btn btn-login">Login</a>
                        <a href="{{ url('/register') }}" class="btn btn-register">Register</a>
                    </div>
                @else
                    <h2>Welcome Back, {{ Auth::user()->name }}! 🎉</h2>
                    <p>Ready to take on a new challenge?</p>
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
                @endguest
            </section> -->

            <section class="features">
                <h2>Why Choose QuizzyBee?</h2>
                <div class="feature-grid">
                    <div class="feature-item">
                        <h3>🏆 Leaderboard</h3>
                        <p>Compete with players worldwide.</p>
                    </div>
                    <div class="feature-item">
                        <h3>📚 Multiple Categories</h3>
                        <p>Explore quizzes in various subjects.</p>
                    </div>
                    <div class="feature-item">
                        <h3>🎯 Instant Feedback</h3>
                        <p>Get answers and explanations instantly.</p>
                    </div>
                </div>
            </section>

            <section class="testimonials">
                <h2>What Players Say</h2>
                <div class="testimonial-box">
                    <p>"QuizzyBee is the best way to test my knowledge while having fun!"</p>
                    <span>- Happy User</span>
                </div>
            </section>
        </div>
    </main>
@endsection
