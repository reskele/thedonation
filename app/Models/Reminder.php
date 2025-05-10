<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',        // 'donation' or 'outfit'
        'message',
        'remind_at',
        'is_sent',
    ];

    protected $casts = [
        'remind_at' => 'datetime',
        'is_sent' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Optional helper: is the reminder due?
    public function isDue()
    {
        return !$this->is_sent && $this->remind_at <= now();
    }
}
