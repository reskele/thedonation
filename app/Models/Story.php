<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    /** @use HasFactory<\Database\Factories\StoryFactory> */
    use HasFactory;

    protected $fillable = [
        'donation_request_id',
        'recipient_id',
        'content',
    ];

    // Relationships

    public function donationRequest() {
        return $this->belongsTo(DonationRequest::class);
    }
    
    public function recipient() {
        return $this->belongsTo(User::class, 'recipient_id');
    }
    
}
