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
            <p class="recipe-cost">Estimated Cost: ${{ number_format($recipe->ingredients->sum(function($ing) { return ($ing->quantity ?? 0) * ($ing->cost ?? 0); }) ?? 0, 2) }}</p>

            <h2>Ingredients</h2>
            <ul class="recipe-ingredients">
                @foreach ($recipe->ingredients as $ingredient)
                    <li>{{ $ingredient->quantity }} x {{ $ingredient->title }} - ${{ number_format($ingredient->cost, 2) }}</li>
                @endforeach
            </ul>

            <h2>Steps</h2>
            <ul class="recipe-steps">
                @foreach ($recipe->steps as $step)
                    <li>
                        <strong>Step {{ $step->step_order }}:</strong>
                        <div class="step-desc">{{ $step->description }}</div>
                    </li>
                @endforeach
            </ul>
        </div>

    </section>

    @include('layouts.footer.main')
</body>
<style> 
    .recipe-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
    }
    .recipe-image-section {
        width: 100%;
        max-width: 600px;
        margin-bottom: 20px;
    }
    .recipe-image {
        width: 100%;
        height: auto;
        border-radius: 8px;
    }
    .recipe-details-section {
        width: 100%;
        max-width: 600px;
        text-align: left;
    }
    .recipe-title {
        font-size: 24px;
        margin-bottom: 10px;
    }
    .recipe-author {
        font-size: 18px;
        color: #555;
        margin-bottom: 10px;
    }
    .recipe-time {
        font-size: 16px;
        color: #777;
        margin-bottom: 20px;
    }
    .recipe-cost {
        font-size: 16px;
        color: #444;
        margin-bottom: 20px;
        font-weight: 600;
    }
    .recipe-ingredients {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .recipe-ingredients li {
        font-size: 16px;
        margin-bottom: 10px;
    }
</style>
</html>