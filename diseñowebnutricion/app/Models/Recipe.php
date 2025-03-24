<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;
    
    protected $table = "recipes";
    protected $primaryKey = 'id';
    protected $perPage = 20;

    protected $fillable = [
        'recipename',
        'descripcion',
        'ingredients',
        'instructions',
        'calories',
        'protein',
        'carbs',
        'fats',
        'category',
        'userID'
    ];

    protected $casts = [
        'calories' => 'decimal:2',
        'protein' => 'decimal:2',
        'carbs' => 'decimal:2',
        'fats' => 'decimal:2'
    ];

    /**
     * Get the user that created the recipe.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }
} 