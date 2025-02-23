<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\Question;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        // Fetch all users
        $allUsers = User::latest()->get();

        // Fetch dashboard stats
        $totalUsers = User::count();
        $totalQuizzes = Quiz::count();
        $totalQuestions = Question::count();
        $recentAttempts = QuizAttempt::latest()->take(5)->get();
        $activeUsers = User::where('updated_at', '>=', Carbon::now()->subDay())->count();

        return view('admin.admindashboard', compact(
            'totalUsers', 'totalQuizzes', 'totalQuestions', 'recentAttempts', 'activeUsers', 'allUsers'
        ));
    }
}
