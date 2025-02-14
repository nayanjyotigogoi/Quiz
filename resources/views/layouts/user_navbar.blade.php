<!-- Hamburger Menu Button -->
<button class="menu-toggle">☰</button>

<!-- Sidebar -->
<aside class="sidebar">
    <ul>
        <li><a href="#"><i class="fas fa-user-logo"></i>© QUIZZYBEE</a></li>
        <li><a href="{{ route('user.dashboard') }}">🏠 Dashboard</a></li>
        <li><a href="{{ route('user.my_quizzes') }}">📋 My Quizzes</a></li>

        <!-- <li><a href="#">⚙️ Settings</a></li> -->
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">🚪 Logout</button>
            </form>
        </li>
    </ul>
</aside>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.querySelector(".menu-toggle");
    const sidebar = document.querySelector(".sidebar");

    menuToggle.addEventListener("click", function () {
        sidebar.classList.toggle("open");
    });
});
</script>

