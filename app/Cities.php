<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model 
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('name','governorate_id');

    public function governorate()
    {
        return $this->belongsTo('App\Governorate');
    }

    public function client()
    {
        return $this->hasMany('App\Client');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

}