<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->slug;

        $listOrders = Order::where("order_slug", "=", $user)->get();
        // $listOrders = Order::all();

        /* $users = DB::table('users')->join('dishes', 'dishes.user_id', '=', 'users.id')
            ->join('dish_order', 'dishes.id', '=', 'dish_order.dish_id')
            ->join('orders', 'dish_order.order_id', '=', 'orders.id')
            ->where('users.id', '=', $user)
            ->get();

            $listOrders = array();
        
            foreach ($users as $order) {

                if(isset($listOrders[$order->order_id], $listOrders)){
                    array_push($listOrders[$order->order_id]['dishes'], $order->name );
                } else {
                $listOrders[$order->order_id]['dishes'] = [$order->name];
                }

                $listOrders[$order->order_id]['name_client'] = $order->name_client;
                $listOrders[$order->order_id]['surname_client'] = $order->surname_client;
                $listOrders[$order->order_id]['phone_client'] = $order->phone_client;
                $listOrders[$order->order_id]['email_client'] = $order->email_client;
                $listOrders[$order->order_id]['address_client'] = $order->address_client;
                $listOrders[$order->order_id]['total_price'] = $order->total_price;


            }
        */   

        // dd($listOrders);
 
                
        return view('admin.orders.index', [
            "order_dishes" => $listOrders,
    
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

    /* Funzione per fare il grafico per anno */

    public function getChart()
    {

        $user = Auth::user()->slug;

        /* $userOrders = Order::where("order_slug", "=", $user)->get(); */
        

        $userOrders = DB::table('orders')
                      ->select(DB::raw('created_at, SUM(total_price)'))
                      ->where('order_slug' , 'like' , $user)
                      ->groupBy('created_at')
                      ->get();
                
           /* dd($userOrders);  */
        
                foreach($userOrders as $data)
                {
                 /*  $month[] = $data['created_at'];
                  $amount[] = $data['total_price']; */
                  /* dd($data); */
                }
              
    

        return view('admin.orders.chart', [
            "month" => $month,
            "amount" => $amount,
    
        ]); 


        // trasformo l'array in array normale
      /*   $risto = [];
        foreach ($userOrders as $order) {
            $risto[] = $order->order_slug;
        }

        // creo un array per mese

        $month = Order::find($risto)

            ->groupBy([function ($d) {

                return Carbon::parse($d->date)->format('M');
            }])
            ->toArray();
        $month = array_keys($month);

        dd($month); */

       /*  return view('admin.orders.chart', ["month"=>$month]); */
    } 
}

      
        
       /*  return view('admin.orders.chart', [
            "data_order" => $userOrders,
    
        ]);  */
    

