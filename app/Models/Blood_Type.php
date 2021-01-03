<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blood_Type extends Model
{

    protected $table = 'blood_types';
    public $timestamps = false;
    protected $fillable = array('name');

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

    public function donation_reguests()
    {
        return $this->hasMany('App\Models\Donation_Reguest');
        //yasser
    }

}
