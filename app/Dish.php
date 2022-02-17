<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{
    use SoftDeletes;

    protected $table = "dishes";

    protected $fillable = ["user_id", "name", "description", "price", "image_url", "visibility"];

    public function orders() {

        return $this->belongsToMany('App\Order', 'dish_order')->withPivot('quantity');
    
    }

    public function user() {

        return $this->belongsTo('App\User');
    }
}
