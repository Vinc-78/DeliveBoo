<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $table = "dishes";

    protected $fillable = ["user_id", "name", "description", "price", "image_url", "visibility"];


    public function users() {

        return $this->belongsTo('App\User');
    
    }


    public function orders() {

        return $this->belongsToMany('App\Order', 'dish_order');
    
    }
}
