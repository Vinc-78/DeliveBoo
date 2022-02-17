<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index() {
        
        $categories =Category::orderBy("name")->get();

        return response()->json($categories); 
    }
}
