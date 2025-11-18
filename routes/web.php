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

Route::get('/settings', function () {
    return view('pages.settings');
});
