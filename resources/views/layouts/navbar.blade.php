<nav class="navbar">
    <a href="{{ url('/') }}" class="logo">QuizzyBee</a>
    <ul class="nav-links">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/categories') }}">Categories</a></li>
        <li><a href="{{ url('/leaderboard') }}">Leaderboard</a></li>
        <li><a href="{{ url('/about') }}">About</a></li>
        <li><a href="{{ url('/contact') }}">Contact</a></li>
    </ul>
    <div class="menu-toggle" onclick="toggleMenu()">
        <div></div>
        <div></div>
        <div></div>
    </div>
</nav>
