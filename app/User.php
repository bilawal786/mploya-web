<?php

namespace App;


use App\Review;
use App\Applied;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'otp', 'user_type', 'projects'
    ];

    public function applieds()
    {
        return $this->belongsToMany(Applied::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getleanguageAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }

    public function geteducationNameAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }
    public function geteducationDescriptionAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }
    public function geteducationCompleteDateAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }
    public function geteducationIsContinueAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }



    public function getprojectTitleAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }
    public function getprojectOccupationAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }
    public function getprojectYearAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }
    public function getprojectLinksAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }
    public function getprojectDescriptionAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }

    public function getskillNameAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }

    public function getcertificationNameAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }
    public function getcertificationYearAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }
    public function getcertificationDescriptionAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }

    public function getsocialLinksAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
