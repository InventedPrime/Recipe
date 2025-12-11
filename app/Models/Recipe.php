<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'total_time_to_make',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->hasOne(RecipeImage::class);
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'recipe_categories');
    }

    public function steps()
    {
        return $this->hasMany(RecipeSteps::class, 'recipe_id')->orderBy('step_order');
    }
}
