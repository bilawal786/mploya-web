<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Applied extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
