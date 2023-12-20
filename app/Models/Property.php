<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    function owner()
    {
        return $this->belongsTo(User::class, 'uid');
    }
    function propertyImage()
    {
        return $this->hasMany(PropertyImage::class, 'property_id');
    }
}
