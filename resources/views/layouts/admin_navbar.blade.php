<!-- Hamburger Menu Button -->
<button class="hamburger" onclick="toggleSidebar()">☰</button>

<nav class="admin-navbar">
    <aside class="sidebar" id="sidebar">
        <h2>QuizzyBee Admin</h2>
        <ul>
            <li><a href="{{ url('/admin/dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="{{ route('admin.quiz.create') }}"><i class="fas fa-plus-circle"></i> Create Quiz</a></li>
        </ul>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">🚪 Logout</button>
        </form>
    </aside>
</nav>

<script>
    function toggleSidebar() {
        document.getElementById("sidebar").classList.toggle("show");
    }
</script>
