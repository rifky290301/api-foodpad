<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'recipe_id')->with('user');
    }

    public function steps()
    {
        return $this->hasMany(Step::class, 'recipe_id');
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredients::class, 'recipe_id');
    }

    public function categories()
    {
        return $this->hasMany(CategoryRecipes::class, 'recipe_id')->with("category");
    }
}
