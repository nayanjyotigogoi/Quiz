@extends('layouts.layout')
@section('content')
    <main class="main-content">

        <!-- Quiz Categories Section -->
        <div class="quiz-container">
            <h1>Select a Quiz Category</h1>
            <div class="categories">
                <button class="category-btn" onclick="showSubcategories('subjects')">📚 Subjects</button>
                <button class="category-btn" onclick="showSubcategories('pyq')">📜 PYQs</button>
            </div>

            <!-- Subcategories Section -->
            <div id="subjects" class="subcategories">
                <h2>Select a Subject</h2>
                <button onclick="goToQuiz('literature')">📖 Literature</button>
                <button onclick="goToQuiz('history')">🏛 History</button>
                <button onclick="goToQuiz('science')">🔬 Science</button>
            </div>

            <div id="pyq" class="subcategories">
                <h2>Select a PYQ</h2>
                <button onclick="goToQuiz('cuet_2024')">📅 CUET 2024</button>
                <button onclick="goToQuiz('cuet_2023')">📅 CUET 2023</button>
            </div>

            <!-- Back Button -->
            <button class="back-btn" onclick="window.location.href='{{ url('/') }}'">⬅ Back</button>
        </div>
    </main>
@endsection

@push('scripts')
<script>
    function showSubcategories(category) {
        document.querySelectorAll('.subcategories').forEach(sub => sub.style.display = 'none');
        document.getElementById(category).style.display = 'block';
    }

    function goToQuiz(category) {
        alert("Loading " + category + " quiz..."); 
    }
</script>
@endpush
