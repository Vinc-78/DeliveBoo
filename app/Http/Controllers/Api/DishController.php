<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index($id) {

         
        $allDishes = User::with('dishes')->get();

       dd($allDishes);

        return json_encode($allDishes);
}

}