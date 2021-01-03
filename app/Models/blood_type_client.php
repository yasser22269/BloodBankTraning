<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blood_type_client extends Model 
{

    protected $table = 'blood_type_client';
    public $timestamps = false;
    protected $fillable = array('client_id', 'blood_type_id');

}