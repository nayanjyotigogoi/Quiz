@extends('layouts.user_layout')

@section('title', 'Select Subcategory')

@section('content')
    <div class="selection-container">
        <h3>Select a Subcategory</h3>
        <select id="subcategorySelect" class="select-box">
            <option value="">-- Choose a Subcategory --</option>
            @foreach($subcategories as $subcategory)
                <option value="{{ route('quiz.available', ['subcategory_id' => $subcategory->id]) }}">
                    {{ $subcategory->subcategories_name }}
                </option>
            @endforeach
        </select>
    </div>

    <script>
        document.getElementById('subcategorySelect').addEventListener('change', function() {
            if (this.value) {
                window.location.href = this.value;
            }
        });
    </script>
@endsection
