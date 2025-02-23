@extends('layouts.user_layout')

@section('title', 'Start Quiz')

@section('header', 'Quiz Questions')

@section('content')
    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @else
        <section class="quiz-questions">
            <h3>Answer the following questions</h3>

            <form action="{{ route('quiz.submit', $quiz->id) }}" method="POST">
                @csrf
                
                @foreach ($quiz->questions as $index => $question)
                    <div class="question">
                        <h4>{{ $index + 1 }}. {{ $question->question_text }}</h4>
                        @foreach ($question->options as $option)
                            <label>
                                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}" required>
                                {{ $option->option_text }}
                            </label><br>
                        @endforeach
                    </div>
                @endforeach

                <button type="submit">Submit Quiz</button>
            </form>
        </section>
    @endif

    <style>
        .quiz-questions {
            max-width: 800px;
            margin: auto;
        }
        .question {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #f9f9f9;
        }
        button {
            background: #27ae60;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            display: block;
            width: 100%;
            margin-top: 20px;
        }
        button:hover {
            background: #219150;
        }
    </style>
@endsection
