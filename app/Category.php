<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected  $fillable = ['title', 'image'];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
