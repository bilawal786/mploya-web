<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HireForJob extends Model
{
    protected $fillable = ['employer_id','jobseeker_id'];
}
