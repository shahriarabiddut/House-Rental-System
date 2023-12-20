<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Support extends Model
{
    use HasFactory;
    function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
