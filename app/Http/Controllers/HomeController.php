<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        // Ensure models exist and have data
        $recentQuizzes = Quiz::latest()->take(5)->get();
        $categories = Category::all();

        return view('index', compact('recentQuizzes', 'categories'));
    }
}
