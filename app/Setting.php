<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model 
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('about', 'phone_number', 'email', 'android_app_ur', 'ios_app_url', 'facebook_url', 'twitter_url', 'youtube_url', 'instgram_url', 'whatsapp_url');

}