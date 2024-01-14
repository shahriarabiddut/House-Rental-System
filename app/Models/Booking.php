<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    function tenant()
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }
    function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
    function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }
}
