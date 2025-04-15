<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'user_id',
        'plan_type', // free, premium
        'valid_from',
        'valid_to',
        'status', // active, expired
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
