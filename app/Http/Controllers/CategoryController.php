<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    public function selectCategory()
    {
        $categories = Category::all();
        return view('quiz.select_category', compact('categories'));
    }

}

