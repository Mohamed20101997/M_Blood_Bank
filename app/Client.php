<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model 
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'dob', 'last_date_donation', 'phone_number', 'password','city_id','blood_type_id','code_verify');

    public function city()
    {
        return $this->belongsTo('App\Cities');
    }

    public function blood_type()
    {
        return $this->belongsTo('App\Blood_Type');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Notification');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function blood_type_clients()
    {
        return $this->belongsToMany('App\Blood_Type');
    }
    
    public function bloodtypes()
    {
        return $this->belongsToMany('App\Blood_Type','blood_type_client','client_id','blood_type_id');
    }
    public function governorates()
    {
        return $this->belongsToMany('App\Governorate','client_governorate','client_id','governorate_id');
    }

    public function governorate_clients()
    {
        return $this->belongsToMany('App\Governorate');
    }
    public function tokens()
    {
        return $this->hasMany('App\Token');
    }
}