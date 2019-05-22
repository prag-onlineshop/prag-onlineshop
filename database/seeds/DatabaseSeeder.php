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
<<<<<<< HEAD
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class, 10)->create();
=======
        // $this->call(UsersTableSeeder::class);        
        factory(App\User::class, 10)->create();

        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
>>>>>>> 6bb5100b930e78b3285096a7112468d17122e9ad
    }
}
