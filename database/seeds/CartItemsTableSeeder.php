<?php

use Illuminate\Database\Seeder;

class CartItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cart_items')->insert([
            [
                'item_id' => App\Models\Item::all()->random()->id,
                'cart_id' => App\Models\Cart::all()->random()->id
            ],[
                'item_id' => App\Models\Item::all()->random()->id,
                'cart_id' => App\Models\Cart::all()->random()->id
            ],[
                'item_id' => App\Models\Item::all()->random()->id,
                'cart_id' => App\Models\Cart::all()->random()->id
            ],[
                'item_id' => App\Models\Item::all()->random()->id,
                'cart_id' => App\Models\Cart::all()->random()->id
            ],[
                'item_id' => App\Models\Item::all()->random()->id,
                'cart_id' => App\Models\Cart::all()->random()->id
            ],[
                'item_id' => App\Models\Item::all()->random()->id,
                'cart_id' => App\Models\Cart::all()->random()->id
            ],[
                'item_id' => App\Models\Item::all()->random()->id,
                'cart_id' => App\Models\Cart::all()->random()->id
            ],[
                'item_id' => App\Models\Item::all()->random()->id,
                'cart_id' => App\Models\Cart::all()->random()->id
            ],[
                'item_id' => App\Models\Item::all()->random()->id,
                'cart_id' => App\Models\Cart::all()->random()->id
            ],[
                'item_id' => App\Models\Item::all()->random()->id,
                'cart_id' => App\Models\Cart::all()->random()->id
            ],
        ]);
    }
}
