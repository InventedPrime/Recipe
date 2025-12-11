<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Models\Recipe;
use App\Models\RecipeImage;
use App\Models\Ingredient;
use App\Models\RecipeSteps;
use App\Models\RecipeCategory;

class UploadController extends Controller
{
	// Show upload form
	public function showUpload()
	{
		if ($redirect = (new AuthController)->verifyLoginStatus()) return $redirect;
		return view('pages.upload');
	}

	// Handle upload form submission
	public function store(Request $request)
	{
		$validated = $request->validate([
			'recipe_image' => ['required', 'image'],
			'title' => ['required', 'string', 'max:255'],
			'total_time_to_make' => ['nullable', 'integer'],
			'category_id' => ['required', 'integer', 'exists:categories,id'],
		]);

		$file = $request->file('recipe_image');

		// Create the recipe
		$recipe = Recipe::create([
			'user_id' => Auth::id(),
			'title' => $request->title,
			'total_time_to_make' => $request->total_time_to_make ?? 0,
		]);

        // Save the image
		$imageData = base64_encode(file_get_contents($file->getRealPath()));

		RecipeImage::create([
			'recipe_id' => $recipe->id,
			'image_data' => $imageData,
			'mime_type' => $file->getMimeType(),
		]);

		// Persist ingredients if provided
		$ingredients = $request->input('ingredients', []);
		foreach ($ingredients as $index => $ing) {
			$title = $ing['title'] ?? $ing['name'] ?? null;
			if (empty($title)) continue;
			Ingredient::create([
				'recipe_id' => $recipe->id,
				'title' => $title,
				'quantity' => $ing['quantity'] ?? null,
				'cost' => $ing['cost'] ?? null,
			]);
		}

		// steps
		$steps = $request->input('steps', []);
		foreach ($steps as $i => $step) {
			if (trim($step) === '') continue;
			RecipeSteps::create([
				'recipe_id' => $recipe->id,
				'step_order' => $i + 1,
				'description' => $step,
			]);
		}

		// categories: There will only be one category per recipe 
		RecipeCategory::create([
			'recipe_id' => $recipe->id,
			'category_id' => $request->category_id,
		]);

		return back()->with('status', 'Recipe uploaded successfully!');
	}
}
