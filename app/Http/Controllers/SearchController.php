<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SearchController extends Controller
    {
        public function search(Request $request) {

            $filter = $request->params;


            $usersList = User::whereHas('categories', function(Builder $query) use($filter){
                $query->where('categories.name', $filter);
                
            });

    
            
            
            
            return json_encode($usersList->get(['name', 'address', 'cover_img','id']));
     
  
           
          }
}