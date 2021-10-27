<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'job_title', 'description', 'salary_type', 'occupation', 'education', 'experience', 'jobseeker_id', 'social_links', 'salary',
    ];


    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getsocialLinksAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }

    public function getskillsAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }
}
