<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\{AuthController, UploadController, ProfileController};
use App\Models\{Recipe};

// Home Page
Route::get('/', function () {
    return view('pages.home');
})->name('home');

// Search Page
Route::get('/search', function () {
    if ($redirect = (new AuthController)->verifyLoginStatus()) return 
    $redirect;
    session()->put('selected_category', false);
    $recipes = Recipe::with('image', 'user')->paginate(30);
    return view('pages.search', ['recipes' => $recipes]);
})->name('search');

Route::post('/search', function (Request $request) {
    if ($redirect = (new AuthController)->verifyLoginStatus()) return $redirect;
        session()->put('selected_category', true);
    $categoryId = $request->input('category_id');
    
    if ($categoryId === 'reset') {
        return redirect()->route('search');
    }
    $recipes = Recipe::with(['image', 'user'])
    ->whereHas('categories', function ($query) use ($categoryId) {
        $query->where('category_id', '=', $categoryId);
    })
    ->paginate(30);

    return view('pages.search', ['recipes' => $recipes]);
})->name('post.search');

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

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
 
Route::post('/profile/update-picture', [ProfileController::class, 'updatePicture'])->name('profile.updatePicture');
Route::post('/profile/update-info', [ProfileController::class, 'updateInfo'])->name('profile.updateInfo');
Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');