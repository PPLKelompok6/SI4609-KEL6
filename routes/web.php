<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\AssessmentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
});


// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Support Routes
Route::get('/support/contact', [SupportController::class, 'showContactForm'])->name('support.contact');
Route::post('/support/contact', [SupportController::class, 'submitContact'])->name('support.submit');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');


// Assessment Routes
Route::prefix('assessment')->name('assessment.')->middleware('auth')->group(function () {
    Route::get('/', [AssessmentController::class, 'index'])->name('index');
    Route::get('/start', [AssessmentController::class, 'start'])->name('start');
    Route::get('/{assessment}/result', [AssessmentController::class, 'result'])->name('result');
    Route::post('/{assessment}/submit', [AssessmentController::class, 'submit'])->name('submit');
    Route::get('/{assessment}', [AssessmentController::class, 'show'])->name('show');
    Route::post('/delete/{assessment}', [AssessmentController::class, 'destroy'])->name('destroy'); // Changed to POST
});
