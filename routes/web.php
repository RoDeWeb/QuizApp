<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');
Route::post('/quiz', [QuizController::class, 'store'])->name('quiz.store');
Route::get('/results', [QuizController::class, 'results'])->name('quiz.results');

require __DIR__.'/auth.php';
