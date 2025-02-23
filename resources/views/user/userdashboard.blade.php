@extends('layouts.user_layout')

@section('title', 'User Dashboard')

@section('header', 'Welcome Back, ' . Auth::user()->name . '! 🎉')
@section('subheader', 'Track your progress and take new quizzes')

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
        <h3>🔥 Start a New Quiz</h3>
        <a href="{{ route('quiz.select_category') }}">Start Quiz</a>
    </section>
@endsection