<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $fillable = [
        'user_id',
        'requirement_type', // want_to_buy, want_to_rent
        'property_type',
        'preferred_location_province',
        'preferred_location_district',
        'preferred_location_town',
        'budget_min',
        'budget_max',
        'additional_requirements',
        'contact_number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
