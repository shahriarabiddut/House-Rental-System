<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
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
    function agreement()
    {
        return $this->belongsTo(Agreement::class, 'service_id');
    }
}
