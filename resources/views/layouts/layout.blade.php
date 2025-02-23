<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Basic Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'QuizzyBee - Play, Learn, and Challenge Yourself')</title>
    <meta name="description" content="QuizzyBee is an interactive quiz platform where you can challenge yourself with a variety of quizzes across multiple categories. Learn, play, and test your knowledge!">
    <meta name="keywords" content="quiz, online quiz, trivia, knowledge test, quiz game, learning, QuizzyBee">
    <meta name="author" content="Nayanjyoti Gogoi">
    <meta name="robots" content="index, follow">

    <!-- Open Graph (OG) / Facebook Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', 'QuizzyBee - Play, Learn, and Challenge Yourself')">
    <meta property="og:description" content="QuizzyBee is an interactive quiz platform with exciting quizzes across various categories. Play now and challenge yourself!">
    <meta property="og:image" content="{{ asset('images/quizzybee-thumbnail.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="QuizzyBee">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'QuizzyBee - Play, Learn, and Challenge Yourself')">
    <meta name="twitter:description" content="Test your knowledge with fun and challenging quizzes on QuizzyBee. Explore categories and compete with friends!">
    <meta name="twitter:image" content="{{ asset('images/quizzybee-thumbnail.png') }}">

    <!-- Stylesheets -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/categories.css') }}">

    @stack('styles') <!-- For Additional Page-Specific Styles -->



    
</head>
<body>

    @include('layouts.navbar') <!-- Navbar Section -->

    <main>
        @yield('content') <!-- Dynamic Content -->
    </main>

    @include('layouts.footer') <!-- Footer Section -->

    <!-- JavaScript Files -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
    <script src="{{ asset('js/categories.js') }}"></script>

    @stack('scripts') <!-- For Additional Page-Specific Scripts -->
</body>
</html>
