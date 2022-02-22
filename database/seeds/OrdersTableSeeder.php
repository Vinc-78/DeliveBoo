<?php

use App\Order;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();
        $slugs = [];

        foreach($users as $user){
           $slugs[] = $user->slug;
        }

        shuffle($slugs);

        for ($i=0; $i < 10; $i++) { 
            $newOrder = new Order();
            $newOrder-> name_client = $faker->firstName();
            $newOrder-> surname_client = $faker->lastName();
            $newOrder-> email_client = $faker->email();
            $newOrder-> phone_client = $faker->tollFreePhoneNumber();
            $newOrder-> address_client = $faker->address();
            $newOrder-> payment = $faker->creditCardNumber();
            $newOrder-> total_price = $faker->randomFloat(2, 1, 200.00);
            $newOrder-> order_slug = array_rand(array_flip($slugs), 1);
            $newOrder->save();
        }
    }
}
