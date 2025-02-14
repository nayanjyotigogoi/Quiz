<footer class="footer">
    <div class="footer-container">
        <!-- Left Section -->
        <div class="footer-section">
            <h3>About Us</h3>
            <p>QuizzyBee - Challenge yourself with fun and engaging quizzes!</p>
        </div>

        <!-- Middle Section -->
        <div class="footer-section">
            <h3>Quick Links</h3>
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/categories') }}">Categories</a>
            <a href="{{ url('/leaderboard') }}">Leaderboard</a>
            <a href="{{ url('/contact') }}">Contact</a>
        </div>

        <!-- Right Section - Social Media -->
        <div class="footer-section">
            <h3>Follow Us</h3>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} QuizzyBee. All rights reserved.</p>
    </div>
</footer>

<!-- FontAwesome for Social Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
