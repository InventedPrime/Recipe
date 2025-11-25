<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/search', function () {
    return view('pages.search');
});

Route::get('/upload', function () {
    return view('pages.upload');
});

Route::post('/upload', function (Request $request) {
    // Minimal handling for now; validate the image exists
    $validated = $request->validate([
        'recipe_image' => ['required','image'],
    ]);
    return back()->with('status', 'Recipe uploaded successfully!');
})->name('upload.store');

Route::get('/profile', function () {
    return view('pages.profile');
});

use App\Http\Controllers\AuthController;

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');