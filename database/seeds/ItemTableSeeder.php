<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('item')->insert([
            [
                'name' => $faker->name,
                'description' => $faker->text,
                'price' => $faker->randomFloat(100,2)
            ],
            [
                'name' => $faker->name,
                'description' => $faker->text,
                'price' => $faker->randomFloat(100,2)
            ],
            [
                'name' => $faker->name,
                'description' => $faker->text,
                'price' => $faker->randomFloat(100,2)
            ],
            [
                'name' => $faker->name,
                'description' => $faker->text,
                'price' => $faker->randomFloat(100,2)
            ],
            [
                'name' => $faker->name,
                'description' => $faker->text,
                'price' => $faker->randomFloat(100,2)
            ],
        ]);
    }
}
