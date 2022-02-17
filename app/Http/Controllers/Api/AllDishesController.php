<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use App\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index($id) {

       $user= User::findOrFail($id);
       $dishes=Dish::where('user_id' ,$id)->oderBy('id' , 'desc')->get();
       
       return response()->json($dishes);
        
}

}