<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RecipeHomeF - A Community for Home Cooks</title>
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
        @if ($recipe_images->count())
            @foreach ($recipe_images as $recipe_image)
                <div class="recipe-search-container">
                    <img class="recipe-search-image" src="data:image/png;base64, {{ $recipe_image->image_data }}"
                        alt="">
                    <div class="recipe-tag-container"> {{-- category tag --}}

                        <div class="recipe-tag">
                            <img src={{ asset('img/tag.png') }} alt="tag">
                            <p>breakfast </p>
                        </div>
                        <div class="recipe-tag">
                            <img src={{ asset('img/tag.png') }} alt="tag">
                            <p>can this fit long text? </p>
                        </div>
                    </div>
                    <div class="recipe-search-cover">
                        <b>Sandwhich</b> {{-- title of recipe --}}
                        <p>By Mike De La Cruz</p> {{-- Users name who created it --}}
                        <p>30 minutes</p>
                        <p>Likes: ?</p>
                        {{-- How long it takes to make --}}

                    </div>
                    <button class="recipe-like-button"> {{-- like button --}}
                        <img class="recipe-like-image" src={{ asset('img/likes.png') }} alt="">
                    </button>
                </div>
            @endforeach
        @else
            <p>No recipes found.</p>
        @endif
    </section>

    @include('layouts.footer.main')

    <form action="post"></form>

</body>

</html>
