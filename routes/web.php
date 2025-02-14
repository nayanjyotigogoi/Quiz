<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizAttemptController;
use App\Http\Controllers\UserAnswerController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\RegistrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home Route
Route::get('/', [QuizController::class, 'index']);

// Static Page (Categories)
Route::get('pages/categories', function () {
    return view('pages.categories');
});

// =======================
// AUTHENTICATION ROUTES
// =======================
// Registration
Route::get('/register', [RegistrationController::class, 'register'])->name('register');
Route::post('/register', [RegistrationController::class, 'store'])->name('register.submit');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// =======================
// QUIZ ROUTES
// =======================
// Category & Subcategory Selection
Route::get('/quiz/select-category', [CategoryController::class, 'selectCategory'])->name('quiz.select_category');
Route::get('/quiz/select-subcategory/{category_id}', [SubcategoryController::class, 'selectSubcategory'])->name('quiz.select_subcategory');
Route::get('/quiz/available/{subcategory_id}', [QuizController::class, 'availableQuizzes'])->name('quiz.available');

// Quiz Start & Submission
Route::get('/quiz/start/{quiz_id}', [QuizController::class, 'startQuiz'])->name('quiz.start');
Route::post('/quiz/submit/{quiz_id}', [QuizAttemptController::class, 'submitQuiz'])->name('quiz.submit');

// Quiz Result
Route::get('/quiz/result/{quiz_id}', [QuizAttemptController::class, 'showQuizResult'])->name('quiz.result');

// =======================
// ADMIN DASHBOARD
// =======================
Route::middleware(['auth', 'preventBackHistory'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Quiz Management
    Route::get('/admin/quiz/create', [QuizController::class, 'createQuizForm'])->name('admin.quiz.create');
    Route::post('/admin/quiz/store', [QuizController::class, 'storeQuizWithQuestions'])->name('admin.quiz.store');

    // Question Management
    Route::get('/admin/questions', [QuestionController::class, 'index'])->name('admin.questions');
    Route::get('/admin/questions/edit/{id}', [QuestionController::class, 'editQuestion'])->name('admin.question.edit');
    Route::post('/admin/questions/update/{id}', [QuestionController::class, 'updateQuestion'])->name('admin.question.update');
    Route::delete('/admin/questions/delete/{id}', [QuestionController::class, 'deleteQuestion'])->name('admin.question.delete');

    // create a new Question
    // Route::post('/admin/quiz/store', [QuizController::class, 'storeQuizWithQuestions'])->name('admin.quiz.store');


    // View for Adding Question
    Route::get('/admin/add-question', function () {
        return view('admin.add_question');
    })->name('admin.add_question');
});

// =======================
// USER DASHBOARD
// =======================
Route::middleware(['auth', 'preventBackHistory'])->group(function () {
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

    // Quiz Attempts
    Route::get('/my-quizzes', [QuizAttemptController::class, 'myQuizzes'])->name('user.my_quizzes');

    // View for Quiz Attempt
    // Route::get('/quiz-results/{attempt}', [QuizAttemptController::class, 'quizResults'])->name('user.quiz_results');


});
