<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\{LogController, AuthController};
use App\Models\{Recipe, RecipeImage};
use Illuminate\Support\Facades\View;


Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/search', function () {
        $recipe_images = RecipeImage::get();
    if ($redirect = (new AuthController)->verifyLoginStatus()) return $redirect;
    return view('pages.search', ['recipe_images' => $recipe_images]);
})->name('search');

// This is what we use for debugging better
Route::get('/debug-hints', function () {
    dd(View::getFinder()->getHints());
});


Route::get('/upload', function () {

    if ($redirect = (new AuthController)->verifyLoginStatus()) return $redirect;
    return view('pages.upload');
})->name('upload');

Route::post('/upload', function (Request $request) {
    if ($redirect = (new AuthController)->verifyLoginStatus()) return $redirect;

        $file = $request->file('recipe_image');

        // Create the recipe
        $recipe = Recipe::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description ?? '',
            'directions' => $request->directions ?? '',
            'cook_time_min' => $request->cook_time_min ?? 0,
            'prep_time_min' => $request->prep_time_min ?? 0,
            'servings' => $request->servings ?? 1,
            'status' => 'draft',
        ]);

        $imageData = base64_encode(file_get_contents($file->getRealPath()));
        
        $recipeImage = new RecipeImage();
        $recipeImage->recipe_id = $recipe->id;
        $recipeImage->image_data = $imageData;
        $recipeImage->mime_type = $file->getMimeType();
        $recipeImage->save();

        return back()->with('status', 'Recipe uploaded successfully!');
})->name('form.uploadRecipe');

Route::get('/settings', function () {
    if ($redirect = (new AuthController)->verifyLoginStatus()) return $redirect;
    return view('pages.settings');
})->name('settings');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');