        <!-- Search Bar & Actions -->
        <div class="search-bar">
            <input type="text" placeholder="Search recipes..." id="search-input">
            <button onclick="window.location.href='{{ route('search') }}'">Search</button>
        </div>
        <div class="navbar-header-actions">

            {{-- Auth links: show login/register for guests, profile/logout for authenticated users --}}
            @guest
                <a href="{{ route('login') }}" style="text-decoration:none;color:var(--orange);font-weight:600">Login</a>
                <a href="{{ route('register') }}"
                    style="margin-left:0.5rem;text-decoration:none;color:var(--orange);font-weight:600">Register</a>
            @else
                <div class="navbar-profile-container">

                    <a href="/profile" style="">{{ Auth::user()->name }}</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </div>
            @endguest
        </div>
