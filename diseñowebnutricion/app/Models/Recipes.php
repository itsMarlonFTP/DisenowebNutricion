<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipes extends Model
{
    use HasFactory;
    
    protected $table = "recipes";
    protected $primaryKey = 'id';
    protected $perPage = 20;

    protected $fillable = [
        'recipename',
        'description',
        'ingredients',
        'instructions',
        'preparation_time',
        'cooking_time',
        'servings',
        'calories',
        'protein',
        'carbs',
        'fats',
        'category',
        'difficulty_level',
        'image_url',
        'created_by'
    ];

    protected $casts = [
        'ingredients' => 'array',
        'instructions' => 'array',
        'calories' => 'integer',
        'protein' => 'float',
        'carbs' => 'float',
        'fats' => 'float',
        'preparation_time' => 'integer',
        'cooking_time' => 'integer',
        'servings' => 'integer'
    ];

    /**
     * Get the user that created the recipe.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}

