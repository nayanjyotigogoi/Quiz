<?php

namespace App\Http\Controllers;

use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAnswerController extends Controller {
    public function store(Request $request) {
        $request->validate([
            'quiz_id' => 'required|exists:quizzes,id',
            'question_id' => 'required|exists:questions,id',
            'option_id' => 'required|exists:options,id'
        ]);

        UserAnswer::create([
            'user_id' => Auth::id(),
            'quiz_id' => $request->quiz_id,
            'question_id' => $request->question_id,
            'option_id' => $request->option_id
        ]);

        return response()->json(['message' => 'Answer saved']);
    }
}
