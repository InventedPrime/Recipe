<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecipeImage extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'recipe_id',
        'image_data',
        'mime_type',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
