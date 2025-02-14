@extends('layouts.admin_layout')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/questions.css') }}">
@endpush

@section('content')
    <h2>Manage Questions</h2>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Sl No</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Quiz Name</th>
                    <th>Question</th>
                    <th>Options</th>
                    <th>Correct Answer</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($questions as $index => $question)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $question->quiz->subcategory->category->Category_name ?? 'N/A' }}</td> <!-- Display Category -->
                            <td>{{ $question->quiz->subcategory->subcategories_name ?? 'N/A' }}</td> <!-- Display Subcategory -->
                            <td>{{ $question->quiz->quizzes_name }}</td>
                            <td>{{ $question->question_text }}</td>
                            <td>
                                <ul>
                                @foreach($question->options as $option)
                                    <li>{{ $option->option_text }}</li>
                                @endforeach
                                </ul>
                            </td>

                            <td>
                                {{ $question->options->where('is_correct', 1)->first()->option_text ?? 'N/A' }}
                            </td>
                            <td>
                                <a href="{{ route('admin.question.edit', ['id' => $question->id]) }}" class="edit-btn">✏️Edit</a>

                                <form action="{{ route('admin.question.delete', ['id' => $question->id]) }}" method="POST" class="delete-form">

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn">🗑 Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
            </tbody>

        </table>
    </div>

    <!-- Pagination -->
    <div class="pagination">
        {{ $questions->links() }}
    </div>
@endsection
