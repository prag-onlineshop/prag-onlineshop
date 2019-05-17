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
        // $this->call(UsersTableSeeder::class);
<<<<<<< HEAD
        $this->call(CategoriesTableSeeder::class);
=======
        factory(App\User::class, 10)->create();
>>>>>>> 9c5e5c8a629d9b64a0eac0ac2d10143967c9f92d
    }
}
