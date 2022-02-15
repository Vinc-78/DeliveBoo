<?php

use App\Dish;
use App\Order;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Input\Input;

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
        //$quantity = [];

        foreach ($orders as $order) {
            
            $randomDishesNumber = rand(1,6);
            shuffle($dishes);

            $ordersDishes = array_slice($dishes, 0, $randomDishesNumber);   

            $order->dishes()->attach($ordersDishes);
     
        }    
        
        
    }
}
