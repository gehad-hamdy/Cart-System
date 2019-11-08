<?php


namespace App\Services;


use App\Models\Cart;
use App\Models\Item;
use Carbon\Carbon;

class SelectItemsService
{
    private $itemModel;
    private $cartModel;
    private $customer_id;

    public function __construct(Item $itemModel, Cart $cart) {
        $this->itemModel = $itemModel;
        $this->cartModel = $cart;
        $this->customer_id = 1;
    }
    /* This function for insert new cart for customer */
    public function selectItem($data){
      /* assume the customer logged in */
        $items = array();
        if ($data) {
            foreach ($data['items'] as $value) {
                array_push($items,
                    [
                        'customer_id'=> $this->customer_id,
                        'item_id'    => $value['item_id'],
                        'quantity'   => $value['quantity'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
            }
            $cardItems = $this->cartModel->insert($items);

            return successResponseWithData($cardItems, 'save successful');
        }else{
            return notFoundResponse('Please Send selected Data');
        }
     }

    /* This function for Update the cart of customer by update items quantity */
    public function UpdateCartItem($data){
        $cart = $this->getCart();
              if ($cart){
                  foreach ($data['items'] as $value) {
                      Cart::where([
                          'customer_id' => $this->customer_id,
                          'item_id' => $value['item_id'],
                      ])->update([
                          'quantity' => $value['quantity']
                      ]);
                  }
                  return successResponseWithoutData('Items Updated successful');
              }else{
                  return notFoundResponse('cart not found');
              }
    }

    /* This function for Update the cart of customer by update items quantity */
    public function removeCartItem($data){
        $cart = $this->getCart();
              if ($cart){
                  foreach ($data['items'] as $value) {
                      Cart::where([
                          'customer_id' => $this->customer_id,
                          'item_id' => $value['item_id'],
                      ])->delete();
                  }
                  return successResponseWithoutData('Items deleted successful');
              }else{
                  return notFoundResponse('cart not found');
              }
    }

    /*get cart by customer id*/
    public function getCartItems(){
    }

    /*list all items*/
    public function index(){
       return Item::query()->select('id','name','description','price')->paginate(20);
    }
}
