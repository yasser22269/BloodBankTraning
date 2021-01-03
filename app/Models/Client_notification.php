<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client_notification extends Model 
{

    protected $table = 'client_notification';
    public $timestamps = true;
    protected $fillable = array('client_id', 'notification_id', 'is_read');

}