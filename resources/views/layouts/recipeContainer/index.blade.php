<div class="recipe-search-container">
    <img class="recipe-search-image" src={{ asset('img/mock_sandwhich.jpg') }} alt="">
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
