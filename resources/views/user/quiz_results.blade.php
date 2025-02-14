@extends('layouts.user_layout')

@section('title', 'Quiz Results')

@section('content')
<h2>📊 Quiz Results: {{ $attempt->quiz->title }}</h2>
<p>Date: {{ $attempt->created_at->format('d M Y') }}</p>
<p>Score: {{ $attempt->score }}</p>

<h3>Your Answers:</h3>
<ul>
    @foreach($attempt->userAnswers as $answer)
        <li>{{ $answer->question->text }} - <strong>{{ $answer->option->text }}</strong></li>
    @endforeach
</ul>
@endsection
