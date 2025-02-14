@extends('layouts.user_layout')

@section('title', 'Quiz Results')

@section('header', 'Your Quiz Results 📊')

@section('content')
    <section class="result-container">
        <h2>{{ $quiz->quizzes_name }}</h2>
        <p><strong>Your Score:</strong> {{ $quizAttempt->score }} / {{ $quiz->questions->count() }}</p>

        <div class="result-details">
            @foreach($quiz->questions as $question)
                <div class="question-card">
                    <h4>{{ $question->question_text }}</h4>

                    @php
                        $userAnswer = $userAnswers->where('question_id', $question->id)->first();
                        $selectedOptionId = $userAnswer ? $userAnswer->selected_option_id : null; // Fix this line
                        $correctOption = $question->options->where('is_correct', 1)->first();
                    @endphp

                    @foreach($question->options as $option)
                        <p class="@if($option->id == $correctOption->id) correct-answer 
                                  @elseif($option->id == $selectedOptionId) selected-answer
                                  @endif">
                            {{ $option->option_text }}
                        </p>
                    @endforeach
                </div>
            @endforeach
        </div>

        <a href="{{ route('quiz.select_category') }}" class="btn">Try Another Quiz</a>
    </section>
@endsection
