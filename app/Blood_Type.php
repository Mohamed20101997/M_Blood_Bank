<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blood_Type extends Model 
{

    protected $table = 'blood_types';
    public $timestamps = true;
    protected $fillable = array('name');

    public function clients()
    {
        return $this->hasMany('App\Client');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function client_blood_types()
    {
        return $this->belongsToMany('App\Client');
    }

}