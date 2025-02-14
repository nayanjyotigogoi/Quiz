@extends('layouts.admin_layout')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/questions.css') }}">
@endpush

@section('content')
    <h2>Edit Question</h2>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <form action="{{ route('admin.question.update', $question->id) }}" method="POST">

        @csrf
        

        <div class="form-group">
            <label for="question_text">Question:</label>
            <input type="text" id="question_text" name="question_text" value="{{ old('question_text', $question->question_text) }}" required>
        </div>

        <div class="form-group">
            <label>Options:</label>
            @foreach($question->options as $index => $option)
                <div class="option-group">
                    <input type="text" name="options[{{ $index }}]" value="{{ old("options.$index", $option->option_text) }}" required>
                    <input type="radio" name="correct_option" value="{{ $index }}" {{ $option->is_correct ? 'checked' : '' }}>
                    <label>Correct Answer</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn-submit">Update Question</button>
    </form>

    <a href="{{ route('admin.questions') }}" class="back-link">Back to Questions</a>
@endsection
