<?php
 namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecipeSteps extends Model
{
    public $timestamps = false;
    protected $table = 'recipe_steps';

    protected $fillable = [
        'recipe_id',
        'step_order',
        'description',
    ];
}