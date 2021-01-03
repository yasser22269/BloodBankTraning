<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
class Client extends Authenticatable
{
    use LaratrustUserTrait;

    protected $table = 'clients';
    public $timestamps = true;
    //protected $guard =[];
     protected $fillable = array('phone','email', 'data_of_birth', 'blood_type_id', 'last_donation_date', 'city_id', 'name','password');
      protected $hidden = array('password','api_token');

    public function blood_type()
    {
        return $this->belongsToMany('App\Models\Blood_Type','blood_type_client', 'client_id', 'blood_type_id');
    }


    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function donation_reguests()
    {
        return $this->hasMany('App\Models\Donation_Reguest');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Models\Notification');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Models\Governorate');
    }

    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }
    public function tokens()
    {
        return $this->hasMany('App\Models\token');
    }
}
