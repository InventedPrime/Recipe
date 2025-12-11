<main class="max-w-4xl mx-auto mt-10 p-6">
    <h1 class="text-3xl font-bold mb-6">Profile Settings</h1>

    <!-- Profile Picture Section -->
    <section class="mb-10 profile-section p-6 rounded-xl">
        <h2 class="text-xl font-semibold mb-4">Profile Picture</h2>

        <div class="flex items-center gap-6">
            
            <!-- Circular Image -->
            <div class="w-28 h-28 rounded-full overflow-hidden bg-gray-300 border">
                @if(Auth::user()->profile_picture)
                    <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center text-gray-600">
                        No Image
                    </div>
                @endif
            </div>

            <!-- Upload Button -->
            <form action="{{ route('profile.updatePicture') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-3">
                @csrf
                <input type="file" name="profile_picture" id="profile_picture" class="hidden" onchange="this.form.submit()">
                <button type="button"
                        onclick="document.getElementById('profile_picture').click()"
                        class="btn">
                    Change Picture
                </button>
            </form>
        </div>
    </section>

    <!-- Profile Information Section -->
    <section class="mb-10 profile-section p-6 rounded-xl">
        <h2 class="text-xl font-semibold mb-4">Profile Information</h2>

        <form action="{{ route('profile.updateInfo') }}" method="POST" class="flex flex-col gap-4 max-w-md">
            @csrf

            <label class="flex flex-col">
                <span class="mb-1">Username</span>
                <input type="text" class="input" name="name" value="{{ Auth::user()->name }}">
            </label>

            <label class="flex flex-col">
                <span class="mb-1">Email</span>
                <input type="email" class="input" name="email" value="{{ Auth::user()->email }}">
            </label>

            <button type="submit" class="btn w-fit">Save Changes</button>
        </form>
    </section>

    <!-- Password Section -->
    <section class="mb-10 profile-section p-6 rounded-xl">
        <h2 class="text-xl font-semibold mb-4">Change Password</h2>

        <form action="{{ route('profile.updatePassword') }}" method="POST" class="flex flex-col gap-4 max-w-md">
            @csrf

            <label class="flex flex-col">
                <span class="mb-1">Current Password</span>
                <input type="password" name="current_password" class="input">
            </label>

            <label class="flex flex-col">
                <span class="mb-1">New Password</span>
                <input type="password" name="new_password" class="input">
            </label>

            <label class="flex flex-col">
                <span class="mb-1">Confirm New Password</span>
                <input type="password" name="new_password_confirmation" class="input">
            </label>

            <button type="submit" class="btn w-fit">Update Password</button>
        </form>
    </section>

    <!-- Account Management Section -->
    <section class="profile-section p-6 rounded-xl">
        <h2 class="text-xl font-semibold mb-4">Account Management</h2>
        <div class="flex flex-col gap-4 max-w-md">
            <button class="btn-warning w-fit">Deactivate Account</button>
        </div>
    </section>
</main>