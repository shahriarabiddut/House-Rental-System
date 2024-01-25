<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;
    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
    public function tenant()
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
