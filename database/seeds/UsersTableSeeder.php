<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersList = config('restaurant');

        foreach ($usersList as  $userRestaurant) {
            
            $newUserRestaurant = new User();
            $newUserRestaurant->name = $userRestaurant['name'];
            $newUserRestaurant->address=$userRestaurant['address'];
            $newUserRestaurant->p_iva=$userRestaurant['p_iva'];
            $newUserRestaurant->cover_img=$userRestaurant['coverImg'];
            $newUserRestaurant->email=$userRestaurant['e-mail'];
            $newUserRestaurant->password= Hash::make($userRestaurant['password']);
            $newUserRestaurant->save();
        }
    }
}
