<?php

use App\Category;
use App\User;
use Illuminate\Database\Seeder;

class UsersCategoriesTablePivot extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $categories =  Category::all()->modelKeys();

        foreach ($users as $userRestaurant) {
            
            $randomCategoryNumber = rand(1,2);
            shuffle($categories);

            $restaurantCategories = array_slice($categories, 0, $randomCategoryNumber);

            $userRestaurant->categories()->attach($restaurantCategories);
        }
    }
}
