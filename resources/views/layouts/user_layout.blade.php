<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'User Dashboard') - QuizzyBee</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="{{ asset('css/user_layout.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/start_quiz.css') }}">
    <link rel="stylesheet" href="{{ asset('css/userdashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my_quizzes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_footer.css') }}">

</head>
<body>
    @include('layouts.user_navbar')

    <div class="dashboard-container">
        
        
        <!-- Main Content -->
        <main class="dashboard-content">
            <header>
                <h2>@yield('header', 'Welcome, ' . Auth::user()->name . '! 🎉')</h2>
                <p>@yield('subheader', 'Your personalized quiz dashboard')</p>
            </header>

            <section>
                @yield('content')
            </section>
        </main>
    </div>

    <!-- @include('layouts.user_footer') -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log("Dashboard Loaded!");
        });

      
            function toggleSidebar() {
                document.getElementById("sidebar").classList.toggle("show");
            }
    </script>
</body>
</html>
