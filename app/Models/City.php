<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{

    protected $table = 'cities';
    public $timestamps = false;
    protected $fillable = array('name', 'governorate_id');

    public function governorate()
    {
        return $this->belongsTo('App\Models\Governorate');
    }

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function donation_reguests()
    {
        return $this->hasMany('App\Models\Donation_Reguest');
    }

}