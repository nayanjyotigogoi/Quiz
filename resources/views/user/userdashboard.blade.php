@extends('layouts.user_layout')

@section('title', 'User Dashboard')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/userdashboard.css') }}">
@endpush
@section('header', 'Welcome Back, ' . Auth::user()->name . '! 🚀')
@section('subheader', 'Track your journey and take on new challenges!')

@section('content')
    <section class="dashboard-overview">
        <div class="card">
            <h3>📝 Quizzes Taken</h3>
            <p>{{ $quizzesTaken }}</p>
        </div>

        <div class="card">
            <h3>🏆 Best Score</h3>
            <p>{{ $bestScore ? $bestScore->score . '%' : 'No attempts yet' }}</p>
        </div>

        <div class="card">
            <h3>📅 Last Quiz</h3>
            <p>{{ $lastQuiz ? $lastQuiz->created_at->format('d M, Y') : 'No attempts yet' }}</p>
        </div>
    </section>

    <section class="quick-start">
        <h3>🔥 Ready to Test Your Skills?</h3>
        <a href="{{ route('quiz.select_category') }}" class="start-quiz-btn">Start Quiz 🚀</a>
    </section>

    <!-- Skill Level Progress -->
    <section class="skill-level">
        <h3>⭐ Your Skill Level</h3>
        <div class="progress-bar">
            <div class="progress" data-level="{{ $bestScore ? $bestScore->score : 0 }}"></div>
        </div>
        <p class="level-text">{{ $skillLevel }}</p>
    </section>

    <!-- Daily Streak -->
    
    <section class="streak-section">
        <h3>🔥 Daily Streak</h3>
        <p>{{ $streak > 0 ? "🔥 {$streak}-day streak! Keep going!" : "You broke your streak! Start fresh today." }}</p>

        <div class="streak-calendar">
            @foreach ($calendarDays as $day)
                <div class="day {{ $day['active'] ? 'active' : 'missed' }}" title="{{ $day['date'] }}">
                    {{ $day['day'] }}
                </div>
            @endforeach
        </div>
    </section>

    <!-- Achievements -->
    <section class="achievements">
        <h3>🏆 Your Achievements</h3>
        <ul>
            @forelse ($achievements as $achievement)
                <li>{{ $achievement }}</li>
            @empty
                <li>No achievements yet. Start your quiz journey! 🚀</li>
            @endforelse
        </ul>
    </section>

@endsection
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Skill Level Progress Bar Animation
            const progressBar = document.querySelector('.progress');
            const skillLevel = progressBar.dataset.level;
            progressBar.style.width = skillLevel + "%";
        });
     </script>
@endpush
