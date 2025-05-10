<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class DonationRequest extends Model
{
    /** @use HasFactory<\Database\Factories\DonationRequestFactory> */
    use HasFactory;

    protected $fillable = [
        'donation_post_id',
        'recipient_id',
        'status',
        'requested_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    // Relationships

    public function donationPost() {
        return $this->belongsTo(DonationPost::class);
    }
    
    public function recipient() {
        return $this->belongsTo(User::class, 'recipient_id');
    }
    
    public function story() {
        return $this->hasOne(Story::class);
    }
    
}
