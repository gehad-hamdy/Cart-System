<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('order')->insert([
            [
                'customer_id' => App\Models\Customer::all()->random()->id,
                'total' => $faker->numberBetween(20,300),
                'address' => $faker->address,
                'telephone' => $faker->phoneNumber
            ],
            [
                'customer_id' => App\Models\Customer::all()->random()->id,
                'total' => $faker->numberBetween(20,300),
                'address' => $faker->address,
                'telephone' => $faker->phoneNumber
            ],
            [
                'customer_id' => App\Models\Customer::all()->random()->id,
                'total' => $faker->numberBetween(20,300),
                'address' => $faker->address,
                'telephone' => $faker->phoneNumber
            ],
            [
                'customer_id' => App\Models\Customer::all()->random()->id,
                'total' => $faker->numberBetween(20,300),
                'address' => $faker->address,
                'telephone' => $faker->phoneNumber
            ],
            [
                'customer_id' => App\Models\Customer::all()->random()->id,
                'total' => $faker->numberBetween(20,300),
                'address' => $faker->address,
                'telephone' => $faker->phoneNumber
            ],
        ]);
    }
}
