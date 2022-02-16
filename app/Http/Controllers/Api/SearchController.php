<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
    {
        public function search(Request $request) {
            $filtri = $request -> filtri;
            
            $users = User::with('categories')->orderBy('name');
            foreach ($filtri as $filtro) {
                $users->whereHas('categories', function ($query) use ($filtro) {
                            $query->where('name', $filtro);
                        });
                }
            return response () -> json($users->get());
    }
}