<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationPost extends Model
{
    /** @use HasFactory<\Database\Factories\DonationPostFactory> */
    use HasFactory;

    protected $fillable = [
        'clothing_item_id',
        'donor_id',
        'status',
    ];

    // Relationships

    public function donor() {
        return $this->belongsTo(User::class, 'donor_id');
    }
    
    public function clothingItem() {
        return $this->belongsTo(ClothingItem::class);
    }
    
    public function requests() {
        return $this->hasMany(DonationRequest::class);
    }
}
