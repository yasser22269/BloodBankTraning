<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation_Reguest extends Model
{

    protected $table = 'donation_reguests';
    public $timestamps = true;
    protected $fillable = array('name', 'age', 'hospital_address', 'phone', 'notes', 'bags_num', 'latitude', 'longitude', 'client_id', 'city_id', 'blood_type_id');

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function blood_type()
    {
        return $this->belongsTo('App\Models\Blood_Type');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification','donation_reguest_id');
    }

}
