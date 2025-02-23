<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quiz;

use Illuminate\Http\Request;

class CategoryController extends Controller {
    public function selectCategory()
    {
        $categories = Category::all();
        return view('quiz.select_category', compact('categories'));
    }
    public function showQuizzes($id)
    {
        $category = Category::findOrFail($id);
    
        // Get subcategory IDs that belong to this category
        $subcategoryIds = $category->subcategories()->pluck('id');
    
        // Fetch quizzes that belong to these subcategories
        $quizzes = Quiz::whereIn('subcategory_id', $subcategoryIds)->get();
    
        return view('quiz.quiz_selection', compact('category', 'quizzes'));
    }
    

}
