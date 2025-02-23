@extends('layouts.user_layout')

@section('title', 'Quizzes in ' . $category->name)

<style>
    /* General Container Styling */
    .container {
        max-width: 800px;
        margin: 50px auto;
        padding: 30px;
        background: rgba(255, 255, 255, 0.15);
        border-radius: 12px;
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        text-align: center;
        transition: 0.3s ease-in-out;
    }

    .container:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    /* Heading Styling */
    h1 {
        font-size: 28px;
        font-weight: bold;
        color: #fff;
        background: linear-gradient(90deg, #ff7eb3, #ff758c);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 20px;
    }

    /* No Quizzes Message */
    .no-quizzes {
        font-size: 20px;
        color: #ddd;
        font-style: italic;
    }

    /* Quiz List */
    .quiz-list {
        list-style: none;
        padding: 0;
    }

    .quiz-item {
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        padding: 15px;
        margin: 12px 0;
        border-radius: 8px;
        text-align: center;
        transition: 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    /* Subtle Shine Effect */
    .quiz-item::before {
        content: "";
        position: absolute;
        top: -100%;
        left: -100%;
        width: 200%;
        height: 200%;
        background: rgba(255, 255, 255, 0.15);
        transform: rotate(45deg);
        transition: 0.4s ease-in-out;
    }

    .quiz-item:hover::before {
        top: 100%;
        left: 100%;
    }

    .quiz-item a {
        text-decoration: none;
        color: #fff;
        font-size: 20px;
        font-weight: 600;
        letter-spacing: 1px;
        display: block;
        transition: 0.3s;
    }

    .quiz-item:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
    }

    .quiz-item:active {
        transform: scale(0.95);
    }
</style>

@section('content')
<main>
    <div class="container">
        <h1>Quizzes in {{ $category->name }}</h1>

        @if($quizzes->isEmpty())
            <p class="no-quizzes">No quizzes available in this category.</p>
        @else
            <ul class="quiz-list">
                @foreach($quizzes as $quiz)
                    <li class="quiz-item">
                        <a href="{{ route('quiz.start', $quiz->id) }}">{{ $quiz->quizzes_name }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</main>
@endsection
