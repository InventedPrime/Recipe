<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RecipeHome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    @include('layouts.header.main')

    <section class="section recipe-container">
        <div class="recipe-image-section">
            <img class="recipe-image" src="data:image/png;base64, {{ $recipe->image->image_data }}" alt="">
        </div>

        <div class="recipe-details-section">
            <h1 class="recipe-title">{{ $recipe->title }}</h1>
            <p class="recipe-author">By {{ $recipe->user->name }}</p>
            <p class="recipe-time">Total Time: {{ $recipe->total_time_to_make }} minutes</p>

            <h2>Ingredients</h2>
            <ul class="recipe-ingredients">
                @foreach ($recipe->ingredients as $ingredient)
                    <li>{{ $ingredient->quantity }} x {{ $ingredient->name }} - ${{ number_format($ingredient->cost, 2) }}</li>
                @endforeach
            </ul>

            <h2>Steps</h2>
        </div>

     @include('layouts.footer.main')
</body>
