@extends('layouts.admin_layout')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/create_quiz.css') }}">
@endpush


@section('content')
    <h2>Create a New Quiz</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <div class="alert error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.quiz.store') }}" method="POST">

        @csrf

        <!-- Category Selection -->
        <label for="category_id">Category:</label>
        <select name="category_id" id="category_id" required>
            <option value="">Select Category</option>

            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->Category_name }}</option>
            @endforeach
        </select>
        <input type="text" name="category_name" id="category_name" placeholder="Or Enter New Category">

        <!-- Subcategory Selection -->
        <label for="subcategory_id">Subcategory:</label>
        <select name="subcategory_id" id="subcategory_id" required>
            <option value="">Select Subcategory</option>
                @foreach($subcategories as $subcategory)
                <option value="{{ $subcategory->id }}">{{ $subcategory->subcategories_name }}</option>
                @endforeach
        </select>
        <input type="text" name="subcategory_name" id="subcategory_name" placeholder="Or Enter New Subcategory">

        <!-- Quiz Name -->
        <label for="quizzes_id">Quiz Name:</label>
        <select name="quizzes_id" id="quizzes_id">
            <option value="">Select Quiz</option>
            @foreach($quizzes as $quiz)
                <option value="{{ $quiz->id }}">{{ $quiz->quizzes_name }}</option>
            @endforeach
        </select>
        <input type="text" name="quizzes_name" id="quizzes_name" placeholder="Or Enter New Quiz Name">


        <!-- Questions Section -->
        <div id="questions-container">
            <div class="question">
                <label>Question:</label>
                <input type="text" name="questions[0][question_text]" required>

                <label>Options:</label>
                <input type="text" name="questions[0][options][]" placeholder="Option 1" required>
                <input type="text" name="questions[0][options][]" placeholder="Option 2" required>
                <input type="text" name="questions[0][options][]" placeholder="Option 3">
                <input type="text" name="questions[0][options][]" placeholder="Option 4">

                <label>Correct Answer:</label>
                <select name="questions[0][correct_option]" required>
                    <option value="0">Option 1</option>
                    <option value="1">Option 2</option>
                    <option value="2">Option 3</option>
                    <option value="3">Option 4</option>
                </select>

                <button type="button" class="remove-question" onclick="removeQuestion(this)">Remove</button>
            </div>
        </div>

        <button type="button" onclick="addQuestion()">Add Another Question</button>
        <button type="submit">Save Quiz</button>
    </form>

    <script>
document.addEventListener("DOMContentLoaded", function () {
    let categoryInput = document.getElementById("category_name");
    let categorySelect = document.getElementById("category_id");

    let subcategoryInput = document.getElementById("subcategory_name");
    let subcategorySelect = document.getElementById("subcategory_id");

    let quizInput = document.getElementById("quizzes_name");
    let quizSelect = document.getElementById("quizzes_id");

    // Disable category select when typing in the input
    categoryInput.addEventListener("input", function () {
        if (categoryInput.value.trim() !== "") {
            categorySelect.disabled = true;
            categorySelect.value = ""; // Clear selection
        } else {
            categorySelect.disabled = false;
        }
    });

    // Disable subcategory select when typing in the input
    subcategoryInput.addEventListener("input", function () {
        if (subcategoryInput.value.trim() !== "") {
            subcategorySelect.disabled = true;
            subcategorySelect.value = ""; // Clear selection
        } else {
            subcategorySelect.disabled = false;
        }
    });

    // Disable quiz select when typing in the input
    quizInput.addEventListener("input", function () {
        if (quizInput.value.trim() !== "") {
            quizSelect.disabled = true;
            quizSelect.value = ""; // Clear selection
        } else {
            quizSelect.disabled = false;
        }
    });
});
</script>

@endsection
