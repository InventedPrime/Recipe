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
        <form class="category-form" action={{ route('post.search') }} method="POST">
            @csrf
            @if (Session::get('selected_category') === true)
                @include('layouts.categoryIcons.reset')
            @else
                {{-- Empty --}}
            @endif
            @include('layouts.categoryIcons.american')
            @include('layouts.categoryIcons.asian')
            @include('layouts.categoryIcons.italian')
            @include('layouts.categoryIcons.mexican')
            @include('layouts.categoryIcons.mediterranean')
            @include('layouts.categoryIcons.dessert')
            @include('layouts.categoryIcons.french')
            @include('layouts.categoryIcons.vegan')
            @include('layouts.categoryIcons.seafood')
            @include('layouts.categoryIcons.indian')
            @include('layouts.categoryIcons.breakfast')
        </form>
    </section>

    <section class="section search-container">
        @if ($recipes->count())
            @foreach ($recipes as $recipe)
                <a class="recipe-search-container" href="{{ route('recipe.view', ['id' => $recipe->id]) }}">
                    <img class="recipe-search-image" src="data:image/png;base64, {{ $recipe->image->image_data }}"
                        alt="">
                    @if ($recipe->categories && $recipe->categories->count())
                        <div class="recipe-tag-container"> {{-- category tag --}}
                            @php $cat = $recipe->categories->first(); @endphp
                            @if ($cat)
                                <div class="recipe-tag">
                                    <img src="{{ asset('img/tag.png') }}" alt="tag">
                                    <p>{{ $cat->name }}</p>
                                </div>
                            @endif
                        </div>
                    @endif
                    <div class="recipe-search-cover">
                        <h1>{{ $recipe->title }}</h1> {{-- title of recipe --}}
                        <p>By {{ $recipe->user->name }}</p> {{-- Users name who created it --}}
                        <p>{{ $recipe->total_time_to_make }} minutes</p>
                        {{-- How long it takes to make --}}
                    </div>
                </a>
            @endforeach
        @else
            <div class="search-container-no-recipe">
                <img src={{ asset('img/no_recipe_found.png') }} />
                <h2>We couldn't find any food, looks like its time to hit the gym!</h2>
            </div>
        @endif
    </section>

    @include('layouts.footer.main')

    <form action="post"></form>

</body>

</html>
