<?php

use App\Http\Controllers\QuizController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [QuizController::class, 'index']);



//registration
Route::get('/register', [RegistrationController::class, 'register']);

//login
Route::get('login', [RegistrationController::class, 'login']);
Route::post('store',[RegistrationController::class, 'store']);
