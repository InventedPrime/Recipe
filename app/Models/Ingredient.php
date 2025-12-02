<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'recipe_id',
        'name',
        'quantity',
        'position',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
