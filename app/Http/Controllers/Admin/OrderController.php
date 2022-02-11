<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user()->id;

        $users = DB::table('users')->join('dishes', 'dishes.user_id', '=', 'users.id')
        ->join('dish_order', 'dishes.id', '=', 'dish_order.dish_id')
        ->join('orders', 'dish_order.dish_id', '=', 'orders.id')->where('dishes.user_id', '=', $user)
        ->get();

        /* $orders = DB::table('orders')->join('dish_order', 'orders.id', '=', 'dish_order.order_id')
        ->join('dishes', 'dish_order.dish_id', '=', 'dishes.user_id')
        ->join('users', 'dishes.user_id', '=', 'users.id')->where('orders.name_client', '=', $user)->get(); */

        dd($users);

      /*   SELECT * FROM `orders`
        INNER JOIN `dish_order` ON `orders` . `id` = `dish_order` . `order_id`
        INNER JOIN `dishes` ON `dish_order` . `dish_id` = `dishes` . `user_id`
        INNER JOIN `users` ON `dishes` . `user_id` = `users` . `id` */
                
        return view('admin.orders.index', [
            "orders" => $users,
            /* "dishList" => $dishList, */
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {

        return view("admin.orders.show", [
            "order" => $order,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
