@extends('layouts.user_layout')

@section('title', 'User Dashboard')

@section('header', 'Welcome Back, ' . Auth::user()->name . '! 🚀')
@section('subheader', 'Track your journey and take on new challenges!')

@section('content')
    <section class="dashboard-overview">
        <div class="card">
            <h3>📝 Quizzes Taken</h3>
            <p>{{ $quizzesTaken }}</p>
        </div>

        <div class="card">
            <h3>🏆 Best Score</h3>
            <p>{{ $bestScore ? $bestScore->score . '%' : 'No attempts yet' }}</p>
        </div>

        <div class="card">
            <h3>📅 Last Quiz</h3>
            <p>{{ $lastQuiz ? $lastQuiz->created_at->format('d M, Y') : 'No attempts yet' }}</p>
        </div>
    </section>

    <section class="quick-start">
        <h3>🔥 Ready to Test Your Skills?</h3>
        <a href="{{ route('quiz.select_category') }}" class="start-quiz-btn">Start Quiz 🚀</a>
    </section>

    <!-- Skill Level Progress -->
    <section class="skill-level">
        <h3>⭐ Your Skill Level</h3>
        <div class="progress-bar">
            <div class="progress" data-level="{{ $bestScore ? $bestScore->score : 0 }}"></div>
        </div>
        <p class="level-text">{{ $skillLevel }}</p>
    </section>

    <!-- Daily Streak -->
    
    <section class="streak-section">
        <h3>🔥 Daily Streak</h3>
        <p>{{ $streak > 0 ? "🔥 {$streak}-day streak! Keep going!" : "You broke your streak! Start fresh today." }}</p>

        <div class="streak-calendar">
            @foreach ($calendarDays as $day)
                <div class="day {{ $day['active'] ? 'active' : 'missed' }}" title="{{ $day['date'] }}">
                    {{ $day['day'] }}
                </div>
            @endforeach
        </div>
    </section>

    <!-- Achievements -->
    <section class="achievements">
        <h3>🏆 Your Achievements</h3>
        <ul>
            @forelse ($achievements as $achievement)
                <li>{{ $achievement }}</li>
            @empty
                <li>No achievements yet. Start your quiz journey! 🚀</li>
            @endforelse
        </ul>
    </section>

   

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Skill Level Progress Bar Animation
            const progressBar = document.querySelector('.progress');
            const skillLevel = progressBar.dataset.level;
            progressBar.style.width = skillLevel + "%";
        });
    </script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #111827, #1f2937);
            color: #fff;
        }

        .dashboard-container {
            display: flex;
            padding: 20px;
        }

        .dashboard-content {
            margin-left: 270px;
            padding: 30px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: left;
        }

        .dashboard-header {
            width: 100%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.1);
        }

        .dashboard-header h1 {
            font-size: 28px;
            font-weight: bold;
        }

        .dashboard-overview {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .dashboard-overview .card {
            background: rgba(255, 255, 255, 0.15);
            padding: 22px;
            border-radius: 12px;
            text-align: center;
            width: 30%;
            min-width: 250px;
            transition: 0.3s ease-in-out;
            box-shadow: 0 5px 15px rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        .dashboard-overview .card::before {
            content: "";
            position: absolute;
            top: -100%;
            left: -100%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.2);
            transform: rotate(45deg);
            transition: 0.5s ease-in-out;
        }

        .dashboard-overview .card:hover::before {
            top: 100%;
            left: 100%;
        }

        .dashboard-overview .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 8px 20px rgba(255, 255, 255, 0.2);
        }

        .dashboard-overview .card h3 {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .dashboard-overview .card p {
            font-size: 24px;
            font-weight: 600;
            color: #38bdf8;
        }

        .quick-start {
            margin-top: 35px;
            background: linear-gradient(135deg, #f43f5e, #ec4899);
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            width: 100%;
            box-shadow: 0 6px 15px rgba(255, 255, 255, 0.1);
            transition: 0.3s ease-in-out;
        }

        .quick-start:hover {
            transform: scale(1.05);
        }

        .quick-start h3 {
            font-size: 22px;
            font-weight: bold;
            color: white;
            margin-bottom: 15px;
        }

        .start-quiz-btn {
            display: inline-block;
            padding: 14px 28px;
            background: #ef4444;
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 4px 10px rgba(239, 68, 68, 0.3);
        }

        .start-quiz-btn:hover {
            background: #b91c1c;
            box-shadow: 0 6px 15px rgba(185, 28, 28, 0.4);
            transform: scale(1.05);
        }

        @media (max-width: 1024px) {
            .dashboard-overview {
                flex-direction: column;
                align-items: center;
            }

            .dashboard-overview .card {
                width: 80%;
            }

            .dashboard-content {
                margin-left: 220px;
            }
        }

        @media (max-width: 768px) {
            .dashboard-content {
                margin-left: 200px;
            }

            .quick-start {
                width: 90%;
            }
        }

        @media (max-width: 480px) {
            .dashboard-content {
                margin-left: 0;
            }

            .dashboard-overview .card {
                width: 100%;
            }

            .quick-start {
                width: 100%;
            }
        }

        .skill-level {
            margin-top: 30px;
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.2);
        }

        .progress-bar {
            width: 100%;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            height: 25px;
            position: relative;
            overflow: hidden;
        }

        .progress {
            height: 100%;
            background: linear-gradient(to right, #ef4444, #ec4899);
            width: 0%;
            transition: width 1s ease-in-out;
        }

        .level-text {
            margin-top: 10px;
            font-weight: bold;
            font-size: 20px;
        }

    /* Daily Streak */
    .streak-section {
        margin-top: 30px;
        background: rgba(255, 255, 255, 0.1);
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.2);
        position: relative;
        overflow: hidden;
        border: 2px solid transparent;
        transition: border 0.4s ease-in-out, transform 0.3s;
    }

    .streak-section p {
        font-size: 18px;
        font-weight: 600;
        margin-top: 10px;
    }

    /* If a streak is active, highlight it */
    .streak-section p:contains("🔥") {
        color: #facc15; /* Yellow glow for an active streak */
        text-shadow: 0 0 10px rgba(250, 204, 21, 0.8);
    }

    .streak-section:hover {
        transform: scale(1.03);
        border: 2px solid #facc15;
    }

    /* Achievements */
    .achievements {
        margin-top: 30px;
        background: rgba(255, 255, 255, 0.1);
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.2);
    }

    .achievements ul {
        list-style: none;
        padding: 0;
        margin-top: 15px;
    }

    .achievements li {
        font-size: 16px;
        font-weight: 500;
        background: rgba(255, 255, 255, 0.15);
        padding: 12px;
        margin: 8px 0;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.3s;
        box-shadow: 0 2px 6px rgba(255, 255, 255, 0.2);
    }

    .achievements li:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: scale(1.05);
    }

    .achievements li::before {
        content: "🏅"; /* Achievement badge */
        margin-right: 8px;
    }

    .streak-calendar {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 10px;
        margin-top: 15px;
        padding: 20px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.2);
        text-align: center;
    }

    .day {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 18px;
        border-radius: 8px;
        transition: all 0.3s ease-in-out;
        cursor: pointer;
    }

    .day.active {
        background: linear-gradient(135deg, #f59e0b, #ef4444);
        color: white;
        box-shadow: 0 4px 10px rgba(255, 165, 0, 0.5);
    }

    .day.missed {
        background: rgba(255, 255, 255, 0.1);
        color: #888;
    }

    .day:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 15px rgba(255, 255, 255, 0.3);
    }

    @media (max-width: 600px) {
        .day {
            width: 35px;
            height: 35px;
            font-size: 16px;
        }
    }


    </style>
@endsection
