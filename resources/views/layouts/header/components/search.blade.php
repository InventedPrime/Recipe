        <!-- Search Bar & Actions -->
        <div class="navbar-actions">
            <div class="search-bar">
                <input type="text" placeholder="Search recipes..." id="search-input">
                <button onclick="searchRecipes()">Search</button>
            </div>

            {{-- Auth links: show login/register for guests, profile/logout for authenticated users --}}
            @guest
                <a href="{{ route('login') }}" style="text-decoration:none;color:var(--orange);font-weight:600">Login</a>
                <a href="{{ route('register') }}" style="margin-left:0.5rem;text-decoration:none;color:var(--orange);font-weight:600">Register</a>
            @else
                <a href="/profile" style="text-decoration:none;color:inherit;margin-right:0.5rem">{{ Auth::user()->name }}</a>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;margin:0;">
                    @csrf
                    <button type="submit" style="background:none;border:none;color:var(--orange);cursor:pointer;font-weight:600;padding:0">Logout</button>
                </form>
            @endguest
        </div>