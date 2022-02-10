<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ["name_client", "surname_client", "address_client", "phone_client", "payment"];


    public function dishes() {

        return $this->belongsToMany('App\Dish', 'dish_order');
    
    }
}
