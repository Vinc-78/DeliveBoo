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
        
        //query per ordini per mese
        $orders = Order::orderBy('created_at', 'ASC')->where("order_slug", $user)
                ->groupBy()
                ->get()->toArray();

        
        $chartTotal = [
            'Jan' => 0,
            'Feb' => 0,
            'Mar' => 0,
            'Apr' => 0,
            'May' => 0,
            'Jun' => 0,
            'Jul' => 0,
            'Aug' => 0,
            'Sep' => 0,
            'Oct' => 0,
            'Nov' => 0,
            'Dec' => 0,
        ];

        $chartOrders = [
            'Jan' => 0,
            'Feb' => 0,
            'Mar' => 0,
            'Apr' => 0,
            'May' => 0,
            'Jun' => 0,
            'Jul' => 0,
            'Aug' => 0,
            'Sep' => 0,
            'Oct' => 0,
            'Nov' => 0,
            'Dec' => 0,
            'Total' => 0
        ];

        //PER CALCOLARE IL NUMERO DI ORDINI E IL GUADAGNO TOTALE PER OGNI MESE
        foreach ($orders as $order) {
            $orderDate = Carbon::parse($order['created_at'])->format('M');
            
            foreach ($chartOrders as $key => $totalOrder) {
                if($key === $orderDate){
                    $chartOrders[$key] += 1; 
                    $chartTotal[$key] += intval($order['total_price']);
                }
            }
        }

        $months = array_keys($chartTotal);
        $chartTotal = array_values($chartTotal);
        $chartOrders = array_values($chartOrders);


        return view('admin.orders.chart', [
            "chart_orders" => $chartOrders,
            "chart_total" => $chartTotal,
            "label_months" => $months
        ]); 
    } 
}

      
        
    

