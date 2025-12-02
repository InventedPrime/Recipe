<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'directions',
        'cook_time_min',
        'prep_time_min',
        'servings',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(RecipeImage::class);
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function saves()
    {
        return $this->hasMany(Save::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'recipe_categories');
    }
}
