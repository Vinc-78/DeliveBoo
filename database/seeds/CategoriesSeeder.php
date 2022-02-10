<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurantCategory = [

            [
                 
                'name' => 'Italian',
                'image_url' => 'italiano.jpg'
                
            ],
            [
                
                'name' => 'Chinese',
                'image_url' => 'orientale.jpg'
                
            ],
            [
                
                'name' => 'Fish',
                'image_url' => 'pesce.jpg'
                
            ],
            [
                
                'name' => 'Vegetarian',
                'image_url' => 'vegano.jpg'
                
            ],
            [
                
                'name' => 'Indian',
                'image_url' => 'indiano.jpg'
                
            ],
            [
                
                'name' => 'Chicken',
                'image_url' => 'carne.jpg'
                
            ],
            [
                
                'name' => 'Pizza',
                'image_url' => 'pizza.jpg'
                
            ],
            [
                
                'name' => 'Dessert',
                'image_url' => 'dessert.jpg'
                
            ],
            [
                
                'name' => 'Burgers',
                'image_url' => 'hamburger.jpg'
               
            ],
        ];


        foreach($restaurantCategory as $category){
            $newCategory = new Category();
            $newCategory->name = $category['name'];
            $newCategory->img_category=$category['image_url'];
            $newCategory->save();
        };

    }

}