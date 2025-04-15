<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id',
        'type', // e.g., listing_approved, contact_alert
        'message',
        'is_read',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
