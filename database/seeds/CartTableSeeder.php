<?php

use Illuminate\Database\Seeder;

class CartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('cart')->insert([
            [
                'item_id' => App\Models\Item::all()->random()->id,
                'customer_id' => App\Models\Customer::all()->random()->id,
                'quantity' => $faker->numberBetween(1,20)
            ],
            [
                'item_id' => App\Models\Item::all()->random()->id,
                'customer_id' => App\Models\Customer::all()->random()->id,
                'quantity' => $faker->numberBetween(1,20)
            ],
            [
                'item_id' => App\Models\Item::all()->random()->id,
                'customer_id' => App\Models\Customer::all()->random()->id,
                'quantity' => $faker->numberBetween(1,20)
            ],
            [
                'item_id' => App\Models\Item::all()->random()->id,
                'customer_id' => App\Models\Customer::all()->random()->id,
                'quantity' => $faker->numberBetween(1,20)
            ],
            [
                'item_id' => App\Models\Item::all()->random()->id,
                'customer_id' => App\Models\Customer::all()->random()->id,
                'quantity' => $faker->numberBetween(1,20)
            ],
        ]);
    }
}
