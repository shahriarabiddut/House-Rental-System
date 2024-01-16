<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgreementRequest extends Model
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
    public function agreement()
    {
        return $this->belongsTo(Agreement::class, 'agreement_id');
    }
}
