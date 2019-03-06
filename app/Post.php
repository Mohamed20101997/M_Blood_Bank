<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'image', 'content', 'category_id');

    public function clients()
    {
        return $this->belongsToMany('App\Client');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}