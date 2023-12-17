<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Support extends Model
{
    use HasFactory;
    function student(){
        return $this->belongsTo(Student::class,'user_id');
    }
    function staff(){
        return $this->belongsTo(Staff::class,'repliedby');
    }
}
