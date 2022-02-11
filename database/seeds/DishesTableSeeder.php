<?php

use App\Dish;
use Illuminate\Database\Seeder;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishList = config('dish');
        
        foreach ($dishList as $dish) {
            
            $newDish = new Dish();
            $newDish->name = $dish['name'];
            $newDish->user_id = $dish['restaurant_id'];
            $newDish->price = $dish['price'];
            $newDish->visibility = $dish['visibility'];
            $newDish->description = $dish['description'];
            $newDish->image_url = $dish['image_url'];
            $newDish->save();
        }
        
        
    }
}

