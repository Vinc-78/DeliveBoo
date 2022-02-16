<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request) {

        /* $limit = $request->query("limit"); */
        $category = $request->query("categories");

       /*  if ($limit > 3) {
        $limit = 3;
        } */

    $usersList = User::with("categories")
      ->orderBy("created_at", "DESC")->paginate(10);

        if ($category) {
        $usersList = $usersList->where("category_id", $category);
        }

   /*  if ($limit) {
      $usersList = $usersList->limit($limit)->get();
    } else {
      $usersList = $usersList->paginate(3);
    } */

    return response()->json($usersList);

    }
}
