<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model 
{

    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = array('name', 'age', 'number_of_bags', 'hospital_name', 'latitude', 'longitude', 'phone_number', 'details','blood_type_id','city_id','client_id');

    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }

    public function blood_type()
    {
        return $this->belongsTo('App\Blood_Type');
    }

    public function city()
    {
        return $this->belongsTo('App\Cities');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

}