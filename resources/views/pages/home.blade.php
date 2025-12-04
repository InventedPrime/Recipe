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

    <section class="hero">
        <img class="hero-img" src={{ asset('img/hero/macroni.jpg') }} alt="">
        <div class="hero-content">
            <h1 class="hero-tagline">
                Discover, Cook, and Share Your Favorite Recipes
            </h1>
            <p class="hero-subtitle">
                Join our community of passionate home cooks. Explore trending recipes, share your culinary creations,
                and connect with food enthusiasts.
            </p>
            <div class="hero-buttons">
                <button onclick="document.querySelector('.featured-section').scrollIntoView({ behavior: 'smooth' })"
                    class="btn-primary">
                    Explore Recipes
                </button>
            </div>
        </div>
    </section>

    <!-- Featured Recipes Section -->
    <section class="section featured-section">
        <h2 class="section-title">Trending Recipes</h2>
        <p class="section-subtitle">Discover what everyone's cooking right now</p>
        <div class="recipe-grid" id="featured-grid">
            <!-- Recipe cards will be populated here -->
        </div>
    </section>

    <!-- Categories Section -->
    <section class="section latest-section">
        <h2 class="section-title">Browse by Category</h2>
        <p class="section-subtitle">Explore recipes by your favorite cuisine</p>

        <div class="category-grid" id="category-grid">
            <!-- Category tiles will be populated here -->
        </div>
    </section>

    <!-- Latest Recipes Section -->
    <section class="section latest-section">
        <h2 class="section-title">Latest Creations</h2>
        <p class="section-subtitle">Fresh recipes from our community</p>

        <div class="recipe-grid" id="latest-grid">
            <!-- Latest recipe cards will be populated here -->
        </div>

        <div class="pagination" id="pagination">
            <button class="active">1</button>
            <button>2</button>
            <button>3</button>
            <button onclick="loadMore()">Load More</button>
        </div>
    </section>

    <!-- footer-->
    @include('layouts.footer.main')
    <!-- javascript -->

    <script>
        function searchRecipes() {
            const query = document.getElementById('search-input').value;
            if (query.trim()) {
                window.location.href = `/search?q=${encodeURIComponent(query)}`;
            }
        }

        function toggleFavorite(recipeId) {
            return;
        }

        function loadMore() {
            // Implement load more functionality
            console.log('Loading more recipes...');
        }
    </script>

</body>

</html>
