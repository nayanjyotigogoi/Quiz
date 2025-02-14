@extends('layouts.user_layout')

@section('title', 'My Quizzes')

@section('content')
<h2 class="page-title">📋 My Quizzes</h2>

<div class="quiz-table-container">
    <table class="quiz-table">
        <thead>
            <tr>
                <th>Quiz Name</th>
                <th>Date Taken</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quizzes as $attempt)
            <tr>
                <td>{{ $attempt->quiz->quizzes_name }}</td>
                <td>{{ $attempt->created_at->format('d M Y') }}</td>
                <td>{{ $attempt->score }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
