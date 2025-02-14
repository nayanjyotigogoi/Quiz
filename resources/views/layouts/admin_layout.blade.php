<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('css/admin_navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin_dashboard.css') }}">
  
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Chart.js for analytics -->
    
</head>
<body>

    <!-- Include Navbar -->
    @include('layouts.admin_navbar')

    <div class="admin-container">
        <!-- Main Content -->
        <main class="dashboard-content">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    @yield('scripts') <!-- Allow child views to add custom scripts -->
</body>
</html>
