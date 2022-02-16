<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SearchController extends Controller
    {
        public function search(Request $request) {

          $usersList = User::withCount(['filters' => function($query){
              $query->withFilters();
          }])

          ->get();

          return response()->json($usersList);


           /* versione n.2  
           
            $filter = $request->filters;
            $usersList = User::with("categories");

            $categories =explode(",", $filter["categories"]);

            foreach ($categories as $category) {
                $usersList->whereHas("categories", function (Builder $query) use($category) {
                    $query->where('categories.id', $category);
                });
            }
            return json_encode($usersList->get()); */
        

        /*    versione n.1
        
              $filters = $request->filters;

          

            $usersList = User::with('categories')->orderBy('name');

            foreach ($filters as $filter) {
              $usersList->whereHas('categories', function ($query) use ($filter) {
                        $query->where('name', $filter);
                     });
            }

            return response()->json($usersList); */
           
          }
}