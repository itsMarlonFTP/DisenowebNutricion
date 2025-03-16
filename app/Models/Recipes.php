<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipes extends Model
{
    use HasFactory;
    protected $table = "recipes";
    protected $fillable = ["id","recipename","description","ingredients","instructions","calories","protein","carbs","fats","category","created_at","updated_at"];
    public $timestamps = false;
}

