<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SlugUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=User::all();

        foreach ($users as $user) {
            
            $slug = Str::slug($user->name); 

            $alreadyExists = User::where("slug", $slug)->first();
            $counter = 1;

            while($alreadyExists) { /* Se esiste lo modifica aggiungendo 1 e ricontrolla */
                $newSlug = $slug . "-" . $counter;

                $alreadyExists = User::where("slug", $newSlug)->first();

                $counter ++;
                if(!$alreadyExists){ /* Se non esiste  assegna $newSlug a $slug */
                    $slug = $newSlug;
                }
            }

            $user->slug =$slug;
            $user->save();
        }

    }
}
