<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'recipe_id',
        'title',
        'quantity',
        'cost',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
