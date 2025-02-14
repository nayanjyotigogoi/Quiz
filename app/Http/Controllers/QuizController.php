<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Question;
use App\Models\Option;
use App\Models\QuizQuestion;
use App\Models\QuizAttempt;
use App\Models\QuizOption;
use App\Models\UserAnswer;
use App\Models\QuizResult;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class QuizController extends Controller
{
    public function index()
    {   
        $quizzes = Quiz::with('subcategory')->get();
        return view('index', compact('quizzes'));
    }

    public function createQuizForm()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $quizzes = Quiz::all(); // Fetch all quizzes
    
        return view('admin.create_quiz', compact('categories', 'subcategories', 'quizzes'));
    }
    
    

    public function storeQuizWithQuestions(Request $request)
    {
        $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'category_name' => 'nullable|string|max:255',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'subcategory_name' => 'nullable|string|max:255',
            'quizzes_id' => 'nullable|exists:quizzes,id',
            'quizzes_name' => 'nullable|string|max:255',
            'questions' => 'required|array',
            'questions.*.question_text' => 'required|string|max:1000',
            'questions.*.options' => 'required|array|min:2',
            'questions.*.correct_option' => 'required|integer|min:0|max:3',
        ]);

        // Step 1: Create category if not selected
        if ($request->category_name) {
            $category = Category::create(['Category_name' => $request->category_name]);
            $category_id = $category->id;
        } else {
            $category_id = $request->category_id;
        }

        // Step 2: Create subcategory if not selected
        if ($request->subcategory_name) {
            $subcategory = Subcategory::create([
                'subcategories_name' => $request->subcategory_name,
                'category_id' => $category_id
            ]);
            $subcategory_id = $subcategory->id;
        } else {
            $subcategory_id = $request->subcategory_id;
        }

        // Step 3: Create quiz if not selected
        if ($request->quizzes_name) {
            $quiz = Quiz::create([
                'quizzes_name' => $request->quizzes_name,
                'subcategory_id' => $subcategory_id
            ]);
            $quiz_id = $quiz->id;
        } else {
            $quiz_id = $request->quizzes_id;
        }

        // Step 4: Save Questions
        foreach ($request->questions as $questionData) {
            $question = Question::create([
                'quiz_id' => $quiz_id,
                'question_text' => $questionData['question_text']
            ]);

            foreach ($questionData['options'] as $index => $optionText) {
                Option::create([
                    'question_id' => $question->id,
                    'option_text' => $optionText,
                    'is_correct' => ($index == $questionData['correct_option'])
                ]);
            }
        }

        return redirect()->route('admin.quiz.create')->with('success', 'Quiz created successfully!');
    }



    public function availableQuizzes($subcategory_id)
    {
        $quizzes = Quiz::where('subcategory_id', $subcategory_id)->get();
        return view('quiz.available_quizzes', compact('quizzes'));
    }

    public function startQuiz($quiz_id)
    {
        $quiz = Quiz::with('questions.options')->findOrFail($quiz_id);
        return view('quiz.start_quiz', compact('quiz'));
    }
}
