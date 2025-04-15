<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
       'user_id',
        'listing_type', // for_sale, for_rent
        'property_type',
        'location_province',
        'location_district',
        'location_town',
        'price',
        'size',
        'bedrooms',
        'bathrooms',
        'title_en',
        'title_ta',
        'description_en',
        'description_ta',
        'contact_number',
        'is_premium',
        'is_agent'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }
    
}
