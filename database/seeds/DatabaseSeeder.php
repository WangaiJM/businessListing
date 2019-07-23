<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 3)->create()->each(function($user){
            $user->listings()->saveMany(
                factory(App\Listing::class, rand(3,5))->make()
            );
        });
    }
}
