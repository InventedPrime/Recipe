<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create categories
        Category::create(['name' => 'american']);
        Category::create(['name' => 'asian']);
        Category::create(['name' => 'italian']);
        Category::create(['name' => 'mexican']);
        Category::create(['name' => 'mediterranean']);
        Category::create(['name' => 'dessert']);
        Category::create(['name' => 'french']);
        Category::create(['name' => 'vegan']);
        Category::create(['name' => 'seafood']);
        Category::create(['name' => 'breakfast']);
        Category::create(['name' => 'indian']);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
