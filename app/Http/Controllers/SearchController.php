<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class SearchController extends Controller
    {
        public function search(Request $request) {

          

            $filter = $request->params;

            $countFilter = count($filter['filtri']);

            if(!empty($filter['filtri'])) {

                
                //dd($countFilter);
     
                 
                $usersList = DB::table('users')
                ->select(DB::raw('users.name, address ,cover_img, users.id, users.slug, COUNT(users.id)'))
                ->join('user_category', 'user_category.user_id', '=', 'users.id')
                ->join('categories', 'categories.id', '=', 'user_category.category_id')
                ->whereIn('categories.name', $filter['filtri'])
                ->groupBy('users.id')
                ->havingRaw("count(users.id) = '$countFilter'");
                
                 //$queries = DB::getQueryLog();
                 //dd($queries);
                 
                 return json_encode($usersList->get());

            }   
            else {

                $usersList = DB::table('users')
                ->select(DB::raw('users.name, address ,cover_img, users.id, users.slug'));
                return json_encode($usersList->get());
            }

           
            /* 

            //Old Query 
            
            
            $filter = $request->params;


            $usersList = User::whereHas('categories', function(Builder $query) use($filter){
                $query->where('categories.name', $filter);
                
            });

    
            return json_encode($usersList->get(['name', 'address', 'cover_img','slug'])); */
          
          
  
           
          }
}
