@extends('layouts.user_layout')

@section('title', 'Select Category')

@section('content')
    <div class="selection-container">
        <h3>Select a Category</h3>
        <select id="categorySelect" class="select-box">
            <option value="">-- Choose a Category --</option>
            @foreach($categories as $category)
                <option value="{{ route('quiz.select_subcategory', ['category_id' => $category->id]) }}">
                    {{ $category->Category_name }}
                </option>
            @endforeach
        </select>
    </div>

    <script>
        document.getElementById('categorySelect').addEventListener('change', function() {
            if (this.value) {
                window.location.href = this.value;
            }
        });
    </script>
@endsection
