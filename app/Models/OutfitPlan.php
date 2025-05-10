<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutfitPlan extends Model
{
    /** @use HasFactory<\Database\Factories\OutfitPlanFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'date', 
        'note'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clothingItems()
    {
        return $this->belongsToMany(ClothingItem::class);
    }
}
