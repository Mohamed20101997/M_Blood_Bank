<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model 
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $fillable = array('title', 'body');

    public function clients()
    {
        return $this->belongsToMany('App\Client');
    }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

}