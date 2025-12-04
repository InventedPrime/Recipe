<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RecipeHome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans">

    @include('layouts.header.main')

    <main class="max-w-4xl mx-auto mt-10 p-6">
        <h1 class="text-3xl font-bold mb-6">Profile Settings</h1>

        <!-- Profile Picture Section -->
        <section class="mb-10 border p-6 rounded-xl">
            <h2 class="text-xl font-semibold mb-4">Profile Picture</h2>
            <div class="flex items-center gap-6">
                <div class="w-24 h-24 bg-gray-300 rounded-full"></div>
                <div class="flex flex-col gap-3">
                    <button class="px-4 py-2 border rounded-lg">Change Picture</button>
                    <button class="px-4 py-2 border rounded-lg">Remove Picture</button>
                </div>
            </div>
        </section>

        <!-- Profile Information Section -->
        <section class="mb-10 border p-6 rounded-xl">
            <h2 class="text-xl font-semibold mb-4">Profile Information</h2>
            <form class="flex flex-col gap-4 max-w-md">
                <label class="flex flex-col">
                    <span class="mb-1">Username</span>
                    <input type="text" class="border p-2 rounded" placeholder="Enter username">
                </label>
                <label class="flex flex-col">
                    <span class="mb-1">Email</span>
                    <input type="email" class="border p-2 rounded" placeholder="Enter email">
                </label>
                <button type="button" class="px-4 py-2 border rounded-lg w-fit">Save Changes</button>
            </form>
        </section>

        <!-- Password Section -->
        <section class="mb-10 border p-6 rounded-xl">
            <h2 class="text-xl font-semibold mb-4">Change Password</h2>
            <form class="flex flex-col gap-4 max-w-md">
                <label class="flex flex-col">
                    <span class="mb-1">Current Password</span>
                    <input type="password" class="border p-2 rounded">
                </label>
                <label class="flex flex-col">
                    <span class="mb-1">New Password</span>
                    <input type="password" class="border p-2 rounded">
                </label>
                <label class="flex flex-col">
                    <span class="mb-1">Confirm New Password</span>
                    <input type="password" class="border p-2 rounded">
                </label>
                <button type="button" class="px-4 py-2 border rounded-lg w-fit">Update Password</button>
            </form>
        </section>

        <!-- Account Management Section -->
        <section class="border p-6 rounded-xl">
            <h2 class="text-xl font-semibold mb-4">Account Management</h2>
            <div class="flex flex-col gap-4 max-w-md">
                <button class="px-4 py-2 border rounded-lg w-fit">Deactivate Account</button>
                <button class="px-4 py-2 border rounded-lg w-fit">Delete Account</button>
            </div>
        </section>

    </main>

    @include('layouts.footer.main')

</body>
</html>
