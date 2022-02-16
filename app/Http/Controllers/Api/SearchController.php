<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
    {
        public function search(Request $request) {

            $filters = $request->query('filters');

            
            $usersList = User::with('categories')->get();

            foreach ($filters as $filter) {
              $usersList->whereHas('categories', function ($query) use ($filter) {
                        $query->where('name', $filter);
                     });
            }

            return response()->json($usersList);
           
          }
}