<?php

namespace App\Http\Controllers;

use App\Models\QuizAttempt;
use App\Models\Quiz;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Question;
use App\Models\Option;
use App\Models\QuizQuestion;
use App\Models\UserAnswer;
use App\Models\QuizResult;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Validator as FacadesValidator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizAttemptController extends Controller {
    public function submitQuiz(Request $request, $quiz_id) 
    {
        $user = Auth::user();
        $quiz = Quiz::with('questions.options')->findOrFail($quiz_id);
        $score = 0;
    
        DB::beginTransaction();
    
        try {
            foreach ($quiz->questions as $question) {
                $correctAnswer = $question->options()->where('is_correct', true)->first();
                $userAnswer = $request->answers[$question->id] ?? null;
    
                if ($userAnswer) {
                    if ($correctAnswer && $userAnswer == $correctAnswer->id) {
                        $score++;
                    }
    
                    // Save user answer
                    UserAnswer::create([
                        'user_id' => $user->id,
                        'question_id' => $question->id,
                        'selected_option_id' => $userAnswer
                    ]);
                }
            }
    
            // Save quiz attempt
            QuizAttempt::create([
                'user_id' => $user->id,
                'quiz_id' => $quiz->id,
                'score' => $score
            ]);
    
            DB::commit();
    
            return redirect()->route('quiz.result', ['quiz_id' => $quiz->id]);
    
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Something went wrong! Please try again.');
        }
    }

    public function showQuizResult($quiz_id)
    {
        $user = Auth::user();
        $quiz = Quiz::with('questions.options')->findOrFail($quiz_id);

        // Fetch the latest quiz attempt (WITHOUT withTrashed)
        $quizAttempt = QuizAttempt::where('user_id', $user->id)
            ->where('quiz_id', $quiz->id)
            ->latest()
            ->first();

        // Fetch user answers (WITHOUT withTrashed)
        $userAnswers = UserAnswer::where('user_id', $user->id)
            ->whereIn('question_id', $quiz->questions->pluck('id'))
            ->get();

        // Redirect if no attempt found
        if (!$quizAttempt) {
            return redirect()->route('quiz.select_category')->with('error', 'No quiz attempt found.');
        }

        return view('quiz.result', compact('quiz', 'quizAttempt', 'userAnswers'));
    }

    public function myQuizzes()
    {
        $user = Auth::user();
        $quizzes = QuizAttempt::where('user_id', $user->id)->with('quiz')->get();

        return view('user.my_quizzes', compact('quizzes'));
    }

    public function quizResults($attemptId)
    {
        $attempt = QuizAttempt::where('id', $attemptId)->where('user_id', Auth::id())->with('quiz', 'userAnswers')->firstOrFail();

        return view('user.quiz_results', compact('attempt'));
    }




    
}

