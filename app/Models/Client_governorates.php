<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client_governorates extends Model 
{

    protected $table = 'client_governorate';
    public $timestamps = true;
    protected $fillable = array('client_id', 'governorate_id');

}