<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RecipeHomeF - A Community for Home Cooks</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<header class="navbar">
    <div class="navbar-container">
        <!-- Logo -->
        <div class="navbar-logo" onclick="window.location.href='/'">
            RecipeHome
        </div>

        <!-- Navigation Links (Desktop) -->
        <nav class="navbar-nav">
            <a href="/">Home</a>
            <a href="/categories">Categories</a>
        </nav>

        <!-- Search Bar & Actions -->
        <div class="navbar-actions">
            <div class="search-bar">
                <input type="text" placeholder="Search recipes..." id="search-input">
                <button onclick="searchRecipes()">Search</button>
            </div>
        </div>
    </div>
</header>

<section class="hero">
    <div class="hero-content">
        <h1 class="hero-tagline">
            Discover, Cook, and Share Your Favorite Recipes
        </h1>
        <p class="hero-subtitle">
            Join our community of passionate home cooks. Explore trending recipes, share your culinary creations, and connect with food enthusiasts.
        </p>
        <div class="hero-buttons">
            <button onclick="document.querySelector('.featured-section').scrollIntoView({ behavior: 'smooth' })" class="btn-primary">
                Explore Recipes
            </button>
            @auth
            <button class="btn-secondary">
                Share Recipe
            </button>
            @endauth
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

<footer>
    <div class="footer-container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>About RecipeHome</h3>
                <p>A community driven platform for sharing and discovering delicious recipes from home cooks around the world.</p>
            </div>

            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/categories">Categories</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Explore</h3>
                <ul>
                    <li><a href="/categories?name=breakfast">Breakfast</a></li>
                    <li><a href="/categories?name=lunch">Lunch</a></li>
                    <li><a href="/categories?name=dinner">Dinner</a></li>
                    <li><a href="/categories?name=desserts">Desserts</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Contact</h3>
                <ul>
                    <li><a href="">contact@</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">Facebook</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="footer-logo">
                RecipeHome © 2025
            </div>
        </div>
    </div>
</footer>

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