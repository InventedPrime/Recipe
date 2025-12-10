<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RecipeHome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    @include('layouts.header.upload')


    <section class="section category-container">
        @include('layouts.categoryIcons.american')
        @include('layouts.categoryIcons.asian')
        @include('layouts.categoryIcons.italian')
        @include('layouts.categoryIcons.mexican')
        @include('layouts.categoryIcons.mediterranean')
        @include('layouts.categoryIcons.dessert')
        @include('layouts.categoryIcons.french')
        @include('layouts.categoryIcons.vegan')
        @include('layouts.categoryIcons.seafood')
        @include('layouts.categoryIcons.breakfast')
    </section>

    <section class="section search-container">
        @if ($recipes->count())
            @foreach ($recipes as $recipe)
                <a class="recipe-search-container" href="{{ route('recipe.view', ['id' => $recipe->id]) }}">
                    <img class="recipe-search-image" src="data:image/png;base64, {{ $recipe->image->image_data }}"
                        alt="">
                    <div class="recipe-tag-container"> {{-- category tag --}}

                        <div class="recipe-tag">
                            <img src={{ asset('img/tag.png') }} alt="tag">
                            <p>breakfast </p>
                        </div>
                        <div class="recipe-tag">
                            <img src={{ asset('img/tag.png') }} alt="tag">
                            <p>longer text to fit </p>
                        </div>
                    </div>
                    <div class="recipe-search-cover">
                        <h1>{{ $recipe->title }}</h1> {{-- title of recipe --}}
                        <p>By {{ $recipe->user->name }}</p> {{-- Users name who created it --}}
                        <p>{{ $recipe->total_time_to_make }} minutes</p>
                        {{-- How long it takes to make --}}
                    </div>
                </a>
            @endforeach
        @else
            <p>No recipes found.</p>
        @endif
    </section>

    @include('layouts.footer.main')

    <form action="post"></form>

</body>

</html>
