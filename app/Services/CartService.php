<?php


namespace App\Services;


use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CartService
{
    public function cartItems($customer_id){
        $totalPurchase = 0;
        $customerItems = $this->getCustomerItems($customer_id);

        if (!empty($customerItems->toArray())){
            $customerItems['total_purchase'] = $this->getTotalPurchase($customerItems);
        }else{
            $customerItems['total_purchase'] = $totalPurchase;
        }

        return successResponseWithData($customerItems);
    }

    public function getCustomerItems($customer_id){
        return  Cart::query()
                    ->select('item.name' , 'item.price', 'cart.quantity',
                        DB::raw('ROUND(item.price * cart.quantity, 2) total_price'))
                    ->join('item', 'item.id','=','cart.item_id')
                    ->where('customer_id', $customer_id)
                    ->get();
    }

    public function getTotalPurchase($customerItems){
        $totalPurchase = 0;
        foreach ($customerItems as $item){
            $totalPurchase += $item->total_price;
        }

        return $totalPurchase;
    }

    public function removeItemFromCart($data){
        $cart = Cart::where([
                  'customer_id' => $data['customer_id'],
                  'item_id' => $data['item_id']
                ]);
        if ($cart){
            $cartItem = $cart->delete();
            if ($cartItem) {
                return successResponseWithoutData('Item Removed from the Cart');
            }else {
                return notFoundResponse('Problem in deleting item');
            }
        }else{
                return notFoundResponse('Cart Not Found');
        }

    }
}
