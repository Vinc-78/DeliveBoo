<?php

use App\Dish;
use App\Order;
use Illuminate\Database\Seeder;

class Orders_Dishes_TablePivot extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes = Dish::all()->modelKeys();
        $orders =  Order::all();

        foreach ($orders as $order) {
            
            $randomOrdersNumber = rand(1,6);
            shuffle($dishes);

            $ordersDishes = array_slice($dishes, 0, $randomOrdersNumber);

            $order->dishes()->attach($ordersDishes);
        }
    }
}
