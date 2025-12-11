<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\{AuthController, UploadController};
use App\Models\{Recipe, RecipeCategory, RecipeImage};
use Illuminate\Support\Facades\View;


// Home Page
Route::get('/', function () {
    return view('pages.home');
})->name('home');

// Search Page
Route::get('/search', function () {
    if ($redirect = (new AuthController)->verifyLoginStatus()) return $redirect;
    $recipes = Recipe::with('image', 'user')->paginate(30);
    return view('pages.search', ['recipes' => $recipes]);
})->name('search');

// View Recipe Page
Route::get('/recipe/{id}', function ($id) {
    if ($redirect = (new AuthController)->verifyLoginStatus()) return $redirect;
    $recipe = Recipe::with('image', 'user')->findOrFail($id);
    return view('pages.recipe', ['recipe' => $recipe]);
})->name('recipe.view');

// Profile Page
Route::get('/profile', function () {
    if ($redirect = (new AuthController)->verifyLoginStatus()) return $redirect;
    return view('pages.profile');
})->name('profile');

// Upload Page
Route::get('/upload', [UploadController::class, 'showUpload'])->name('upload');
Route::post('/upload', [UploadController::class, 'store'])->name('form.uploadRecipe');

// Settings Page
// Route::get('/settings', function () {
//     if ($redirect = (new AuthController)->verifyLoginStatus()) return $redirect;
//     return view('pages.settings');
// })->name('settings');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
 