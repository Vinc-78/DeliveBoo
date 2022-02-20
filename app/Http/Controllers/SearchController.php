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

            /* $filter = $request->params;

            $countFilter =count($filter['filtri']);

            $usersList = DB::table('users')
            ->select(DB::raw('users.name, address, cover_img, users.id, users.slug, COUNT(users.id)'))
            ->join('user_category', 'user_category.user_id', '=', 'user.id')
            ->join('categories','categories.id','=','user_category.category_id')
            ->whereIn('categories.name',$filter['filtri'])
            ->groupBy('users.id')
            ->havingRaw("count(users.id) = '$countFilter'");


            return json_encode($usersList->get());  */

            $filter = $request->params;

            if(!empty($filter['filtri'])) {

                $countFilter = count($filter['filtri']);
                //dd($countFilter);
     
                 
                $usersList = DB::table('users')
                ->select(DB::raw('users.name, address ,cover_img, users.id, users.slug, COUNT(users.id)'))
                ->join('user_category', 'user_category.user_id', '=', 'users.id')
                ->join('categories', 'categories.id', '=', 'user_category.category_id')
                ->whereIn('categories.name', $filter['filtri'])
                ->groupBy('users.slug')
                ->havingRaw("count(users.slug) = '$countFilter'");
                
                 //$queries = DB::getQueryLog();
                 //dd($queries);
                 
                 return json_encode($usersList->get());

            } else {

                $usersList = DB::table('users')
                ->select(DB::raw('users.name, address ,cover_img, users.id, users.slug'));
                return json_encode($usersList->get());
            }

            //DB::enableQueryLog();
            /* $usersList = User::whereHas('categories', function(Builder $query) use($filter){
                $query
                ->whereIn('categories.name', $filter)
                ->groupBy('users.id')
                ->having('count(users.id)', '=', count($filter));
                
              
        
                
            }); */
            //$queries = DB::getQueryLog();
            //dd($queries);

          
          
  
           
          }
}
/* $items = DB::table("items")
            ->select("items.id","items.title"
                ,"items.min_quantity"
                ,DB::raw('SUM(items_count.quantity) as total_quantity'))
            ->join("items_count","items_count.id_item","=","items.id")
            ->groupBy("items.id")
            ->having("total_quantity","<",DB::raw("items.min_quantity"))
            ->get();
print_r($items); */