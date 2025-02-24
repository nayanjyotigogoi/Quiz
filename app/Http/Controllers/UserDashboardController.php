<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\QuizAttempt;
use Carbon\Carbon;

class UserDashboardController extends Controller
{
    public function index()
{
    $user = Auth::user();

    // Total quizzes taken
    $quizzesTaken = QuizAttempt::where('user_id', $user->id)->count();

    // Best score (highest percentage)
    $bestScore = QuizAttempt::where('user_id', $user->id)
        ->orderByDesc('score')
        ->first();

    // Last quiz attempted
    $lastQuiz = QuizAttempt::where('user_id', $user->id)
        ->orderByDesc('created_at')
        ->first();

    // Performance Chart Data (Last 7 quizzes)
    $quizPerformance = QuizAttempt::where('user_id', $user->id)
        ->orderBy('created_at', 'asc')
        ->take(7)
        ->pluck('score', 'created_at');

    // Skill Level Indicator
    $skillLevel = "Beginner";
    if ($bestScore) {
        if ($bestScore->score >= 71) {
            $skillLevel = "Expert";
        } elseif ($bestScore->score >= 31) {
            $skillLevel = "Intermediate";
        }
    }

    // Fetch all dates when the user attempted a quiz
    $userStreakDates = QuizAttempt::where('user_id', $user->id)
        ->pluck('created_at')
        ->map(fn($date) => Carbon::parse($date)->format('Y-m-d'))
        ->toArray();

    // Calculate streak
    $streak = 0;
    $yesterday = now()->subDay()->format('Y-m-d');

    if (in_array($yesterday, $userStreakDates)) {
        $streak = 1;
        for ($i = 2; $i <= 30; $i++) {
            if (in_array(now()->subDays($i)->format('Y-m-d'), $userStreakDates)) {
                $streak++;
            } else {
                break;
            }
        }
    }

    // Daily Streak Calendar (Last 30 Days)
    $calendarDays = collect(range(0, 29))->map(function ($i) use ($userStreakDates) {
        $date = now()->subDays($i)->format('Y-m-d');
        return [
            'date' => $date,
            'day' => now()->subDays($i)->format('d'),
            'active' => in_array($date, $userStreakDates), // Check if the user attempted a quiz
        ];
    })->reverse();

    // Achievements
    $achievements = [];
    if ($quizzesTaken > 0) $achievements[] = "🏅 First Quiz Completed";
    if ($bestScore && $bestScore->score >= 90) $achievements[] = "🎯 Scored 90%+";
    if ($quizzesTaken >= 5) $achievements[] = "🚀 5 Quizzes Taken";
    if ($streak >= 7) $achievements[] = "🔥 7-Day Streak";
    if ($bestScore && $bestScore->score == 100) $achievements[] = "🏆 Perfect Score!";

    return view('user.userdashboard', compact('quizzesTaken', 'bestScore', 'lastQuiz', 'quizPerformance', 'skillLevel', 'streak', 'calendarDays', 'achievements'));
}

}
