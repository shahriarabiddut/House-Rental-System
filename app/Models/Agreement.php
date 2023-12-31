<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    use HasFactory;
    public function property()
    {
        return $this->belongsTo(Property::class, 'propertyid');
    }
    public function tenant()
    {
        return $this->belongsTo(User::class, 'tenantid');
    }
}
