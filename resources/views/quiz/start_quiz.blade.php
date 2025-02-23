@extends('layouts.user_layout')

@section('title', 'Start Quiz')

@section('header', 'Good Luck! 🎯')

@section('content')
    <section class="quiz-container">
        <h3>{{ $quiz->quizzes_name }}</h3>
        <form action="{{ route('quiz.submit', ['quiz_id' => $quiz->id]) }}" method="POST">
            @csrf

            @foreach($quiz->questions as $question)
                <div class="question">
                    <h4>{{ $question->question_text }}</h4>

                    <!-- Hidden input ensures an empty value is always sent -->
                    <input type="hidden" name="answers[{{ $question->id }}]" value="">

                    @foreach($question->options as $option)
                        <label>
                            <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}">
                            {{ $option->option_text }}
                        </label>
                    @endforeach
                </div>
            @endforeach

            <button type="submit">Submit Quiz</button>
        </form>
    </section>
@endsection