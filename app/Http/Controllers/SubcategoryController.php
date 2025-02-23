<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller {
    public function selectSubcategory($category_id)
    {
        $subcategories = Subcategory::where('category_id', $category_id)->get();
        return view('quiz.select_subcategory', compact('subcategories'));
    }

}
