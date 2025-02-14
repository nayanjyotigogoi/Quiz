<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller {
    public function index()
    {
        $questions = Question::with('quiz.subcategory.category')->paginate(10); // Eager loading category and subcategory
        return view('admin.questions', compact('questions'));
    }

    public function showQuestions()
    {
        $questions = Question::with(['quiz', 'options'])->paginate(10);
        return view('admin.questions', compact('questions'));
    }

    public function editQuestion($id)
    {
        $question = Question::with('options')->findOrFail($id);
        return view('admin.edit_question', compact('question'));
    }

    public function updateQuestion(Request $request, $id)
    {
        $request->validate([
            'question_text' => 'required|string|max:500',
            'options' => 'required|array|min:2|max:4',
            'options.*' => 'required|string|max:255',
            'correct_option' => 'required|integer|min:0|max:3',
        ]);

        $question = Question::findOrFail($id);
        $question->question_text = $request->question_text;
        $question->save();

        // Fetch existing options
        $existingOptions = $question->options()->get();

        // Update or create options
        foreach ($request->options as $key => $optionText) {
            if (isset($existingOptions[$key])) {
                // Update existing option
                $existingOptions[$key]->update([
                    'option_text' => $optionText,
                    'is_correct' => ($key == $request->correct_option) ? 1 : 0,
                ]);
            } else {
                // Create a new option if not enough exist
                Option::create([
                    'question_id' => $question->id,
                    'option_text' => $optionText,
                    'is_correct' => ($key == $request->correct_option) ? 1 : 0,
                ]);
            }
        }

        return redirect()->route('admin.questions')->with('success', 'Question updated successfully!');
    }


    public function deleteQuestion($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        return redirect()->route('admin.questions')->with('success', 'Question deleted successfully!');
    }

    
}
