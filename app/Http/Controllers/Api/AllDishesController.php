<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index($id) {

         
        $allDishes = User::all();


        return response()->json(['allDishes'=> $allDishes]);
}

}