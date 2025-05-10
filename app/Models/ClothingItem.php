<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClothingItem extends Model
{
    /** @use HasFactory<\Database\Factories\ClothingItemFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'name', 
        'category', 
        'size', 
        'color', 
        'condition',
        'description', 
        'image', 
        'is_donated'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function outfitPlans()
    {
        return $this->belongsToMany(OutfitPlan::class);
    }
}
