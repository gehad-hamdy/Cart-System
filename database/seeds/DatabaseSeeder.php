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
        $this->call([
            CustomerTableSeeder::class,
            ItemTableSeeder::class,
            CartTableSeeder::class,
            OrderTableSeeder::class,
            CartItemsTableSeeder::class
        ]);
    }
}
