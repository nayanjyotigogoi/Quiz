<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Question;

class AdminController extends Controller
{
    public function index()
    {
        $questions = Question::all(); // Fetch all questions
    
        return view('admin.admindashboard', compact('questions'));
    }
    
    
}
