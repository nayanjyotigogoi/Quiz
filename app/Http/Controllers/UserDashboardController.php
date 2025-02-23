<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\QuizAttempt;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
    
        // Fetch quizzes taken by the user
        $quizzesTaken = QuizAttempt::where('user_id', $user->id)->count();
    
        // Fetch best score (highest percentage)
        $bestScore = QuizAttempt::where('user_id', $user->id)
            ->orderByDesc('score') // Assuming 'score' stores the user's marks
            ->first();
    
        // Fetch last quiz attempted
        $lastQuiz = QuizAttempt::where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->first();
    
        return view('user.userdashboard', compact('quizzesTaken', 'bestScore', 'lastQuiz'));
    }
    

}