<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\SurveyController;
use App\Http\Controllers\Frontend\AppController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\BookController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/test/{pincode}', [\App\Http\Controllers\MainController::class, 'getDetailsByPincode']);

//Calculator
Route::get('/get-quote', [AppController::class, 'calculator'])->name('get_quote');
Route::post('/get-quote', [AppController::class, 'getQuoteSubmit'])->name('get_quote.submit');

//Get Quotation
/*Route::get('/get-quote', [AppController::class, 'getQuote'])->name('quote.step1.show');
Route::post('/get-quote', [AppController::class, 'getQuoteSubmit'])->name('quote.step1.submit');
Route::get('/get-quote-step-2', [AppController::class, 'getQuote'])->name('quote.step1.show');
Route::post('/get-quote-step-2', [AppController::class, 'getQuote'])->name('quote.step1.submit');*/

//Registrations
Route::get('/request-survey-now', [SurveyController::class, 'surveyRequest'])->name('survey.request');
Route::post('/request-survey-now', [SurveyController::class, 'surveyRequestSave'])->name('survey.request.save');

Route::get('/book-your-solar-now', [BookController::class, 'bookYourSolarNow'])->name('book.book_now');
Route::post('/book-your-solar-now', [BookController::class, 'bookYourSolarNowStore'])->name('book.book_now.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
