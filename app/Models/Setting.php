<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model 
{

    protected $table = 'settings';
    public $timestamps = false;
    protected $fillable = array('phone', 'email', 'facebook', 'twitter', 'insta', 'youtube', 'about_app', 'notification_text');

}