<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    public function activity_name()
    {
        return $this->belongsTo(Activity::class,'activity_id','id');
    }
    public function user_name()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
