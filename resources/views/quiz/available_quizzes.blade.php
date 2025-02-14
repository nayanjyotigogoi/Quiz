@extends('layouts.user_layout')

@section('title', 'Available Quizzes')

@section('content')
    <div class="selection-container">
        <h3>Select a Quiz</h3>
        <select id="quizSelect" class="select-box">
            <option value="">-- Choose a Quiz --</option>
            @foreach($quizzes as $quiz)
                <option value="{{ route('quiz.start', ['quiz_id' => $quiz->id]) }}">
                    {{ $quiz->quizzes_name }}
                </option>
            @endforeach
        </select>
    </div>

    <script>
        document.getElementById('quizSelect').addEventListener('change', function() {
            if (this.value) {
                window.location.href = this.value;
            }
        });
    </script>
@endsection
