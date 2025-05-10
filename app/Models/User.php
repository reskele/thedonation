<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relationships
    public function clothingItems()
    {
        return $this->hasMany(ClothingItem::class);
    }

    public function outfitPlans()
    {
        return $this->hasMany(OutfitPlan::class);
    }

    public function reminders()
    {
        return $this->hasMany(Reminder::class);
    }

    public function donationPosts()
    {
        return $this->hasMany(DonationPost::class, 'donor_id');
    }

    public function donationRequests()
    {
        return $this->hasMany(DonationRequest::class, 'recipient_id');
    }

    public function stories()
    {
        return $this->hasMany(Story::class, 'recipient_id');
    }

    // Role helpers
    public function isDonor()
    {
        return $this->role === 'donor';
    }

    public function isRecipient()
    {
        return $this->role === 'recipient';
    }
}
