@extends('layouts.admin_layout') 

@section('title', 'Admin Dashboard')

@section('content')
    <div class="dashboard-container">

        <!-- View Questions Button -->
        <div class="dashboard-card view-questions">
            <a href="{{ route('admin.questions') }}" class="btn-view">View All Questions</a>
        </div>

        <!-- Total Users -->
        <div class="dashboard-card total-users">
            <div class="card-icon"><i class="fas fa-users"></i></div>
            <div class="card-content">
                <h3>Total Users</h3>
                <p>{{ $totalUsers }}</p>
            </div>
        </div>

        <!-- Total Quizzes -->
        <div class="dashboard-card total-quizzes">
            <div class="card-icon"><i class="fas fa-file-alt"></i></div>
            <div class="card-content">
                <h3>Total Quizzes</h3>
                <p>{{ $totalQuizzes }}</p>
            </div>
        </div>

        <!-- Total Questions -->
        <div class="dashboard-card total-questions">
            <div class="card-icon"><i class="fas fa-question-circle"></i></div>
            <div class="card-content">
                <h3>Total Questions</h3>
                <p>{{ $totalQuestions }}</p>
            </div>
        </div>

        <!-- Active Users (Last 24 Hours) -->
        <div class="dashboard-card active-users">
            <div class="card-icon"><i class="fas fa-user-clock"></i></div>
            <div class="card-content">
                <h3>Active Users (24H)</h3>
                <p>{{ $activeUsers }}</p>
            </div>
        </div>

        <!-- Recent Quiz Attempts -->
        <div class="dashboard-card recent-attempts">
            <div class="card-icon"><i class="fas fa-chart-line"></i></div>
            <div class="card-content">
                <h3>Recent Quiz Attempts</h3>
                <ul>
                    @foreach($recentAttempts as $attempt)
                        <li>
                            {{ $attempt->user->name }} - <strong>Score:</strong> {{ $attempt->score }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- All Registered Users -->
        <div class="dashboard-card all-users">
            <div class="card-icon"><i class="fas fa-users"></i></div>
            <div class="card-content">
                <h3>All Registered Users</h3>
                <ul>
                    @foreach($allUsers as $user)
                        <li>{{ $user->name }} <span class="date">({{ $user->created_at->format('d M Y') }})</span></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <style>
        .dashboard-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        /* View Questions Button */
        .view-questions {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .btn-view {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #fff;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 16px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s ease;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .btn-view:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            background: linear-gradient(135deg, #2575fc, #6a11cb);
        }

        /* Dashboard Cards */
        .dashboard-card {
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            padding: 20px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        /* Different Gradients */
        .total-users { background: linear-gradient(135deg, #667eea, #764ba2); }
        .total-quizzes { background: linear-gradient(135deg, #f7797d, #FBD786); }
        .total-questions { background: linear-gradient(135deg, #43cea2, #185a9d); }
        .active-users { background: linear-gradient(135deg, #ff758c, #ff7eb3); }
        .recent-attempts { background: linear-gradient(135deg, #6a11cb, #2575fc); }
        .all-users { background: linear-gradient(135deg, #ff9a9e, #fad0c4); max-height: 300px; overflow-y: auto; }

        /* Card Icon */
        .card-icon {
            font-size: 32px;
            background: rgba(255, 255, 255, 0.2);
            padding: 18px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Card Content */
        .card-content h3 {
            margin: 0;
            font-size: 18px;
            opacity: 0.9;
        }

        .card-content p {
            font-size: 24px;
            font-weight: bold;
        }

        .card-content ul {
            list-style: none;
            padding: 0;
            margin-top: 10px;
        }

        .card-content ul li {
            font-size: 16px;
            padding: 5px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
@endsection
