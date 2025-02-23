@extends('layouts.layout')

@section('title', 'Welcome to QuizzyBee')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush
@section('content')
<main>
    <div class="home-container">

        <!-- Animated Floating Elements -->
        <div class="floating-elements-container">
            <div class="floating-element">❓</div>
            <div class="floating-element">⭐</div>
            <div class="floating-element">🎯</div>
            <div class="floating-element">💡</div>
            <div class="floating-element">📜</div>
        </div>

        <!-- Hero Section -->
        <section class="hero">
            <h1 class="animated-text">Welcome to <span>QuizzyBee</span>!</h1>
            <p class="animated-text">Challenge yourself, test your knowledge, and have fun!</p>
            <button class="glow-button" onclick="window.location.href='{{ url('/login') }}'">Start Your Quiz 🚀</button>
        </section>

        <!-- How It Works Section -->
        <section class="how-it-works">
            <h2>🎮 How It Works</h2>
            <div class="steps-container">
                <div class="step">1️⃣ Select a Category</div>
                <div class="step">1️⃣ Select a SubCategory</div>
                <div class="step">2️⃣ Pick a Quiz Title</div>
                <div class="step">3️⃣ Answer Questions</div>
                <div class="step">4️⃣ Get Your Score!</div>
            </div>
        </section>

        <!-- Strong Call to Action -->
        <section class="cta-section">
            <h2>🎯 Ready to Test Your Knowledge?</h2>
            <button class="glow-button" onclick="window.location.href='{{ url('/register') }}'">Join Now 🚀</button>
        </section>

        <!-- Why QuizzyBee? -->
        <section class="why-quizzybee">
            <h2>💡 Why QuizzyBee?</h2>
            <p>📌 Fun & Engaging Quizzes</p>
            <p>📌 Wide Variety of Categories</p>
            <p>📌 Instant Feedback & Scores</p>
            <p>📌 Play Anytime, Anywhere</p>
        </section>

        <!-- Fun Quiz Facts -->
        <section class="fun-facts">
            <h2>💬 Fun Quiz Facts</h2>
            <p>🧠 Did you know? Taking quizzes can improve memory retention by 50%!</p>
            <p>🎭 The first-ever trivia game was played in the 1940s!</p>
            <p>🌍 Over 1 million quizzes are played online every day!</p>
        </section>

        

        <!-- Recent Quizzes Section -->
        <section class="recent-quizzes">
            <h2>🔥 Recent Quizzes</h2>
            <div class="quiz-grid">
                @foreach($recentQuizzes as $quiz)
                    <div class="quiz-card">
                        <h3>{{ $quiz->quizzes_name }}</h3>
                        <a href="{{ route('quiz.start', $quiz->id) }}" class="take-quiz-btn">Take Quiz</a>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Categories Section -->
        <section class="categories">
            <h2>📚 Explore Categories</h2>
            <div class="category-grid">
                @foreach($categories as $category)
                    <div class="category-card">
                        <h3>{{ $category->Category_name }}</h3>
                        <a href="{{ route('category.quizzes', $category->id) }}" class="explore-btn">Explore</a>
                    </div>
                @endforeach
            </div>
        </section>

    </div>
</main>

@endsection
@push('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@endpush
