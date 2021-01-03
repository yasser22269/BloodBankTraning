<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    public $timestamps = true;
    protected $fillable = array('title', 'body', 'donation_reguest_id');

    public function donation_reguests()
    {
        return $this->belongsTo('App\Models\Donation_Reguest');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

}
