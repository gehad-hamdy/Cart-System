<?php


namespace App\Services;


use App\constants\Payments;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Order;

class PaymentService
{
    private $itemModel;
    private $cartModel;
    private $customer_id;

    public function __construct(Item $itemModel, Cart $cart) {
        $this->itemModel = $itemModel;
        $this->cartModel = $cart;
        $this->customer_id = 1;
    }

    private function checkPaymentType($data){
        if ($data['payment_type'] != Payments::STORECREDITS){
              return false;
        }else{
             return true;
        }
    }

    public function confirmTransaction($data, $customer_id){
        try {
            if ($this->checkPaymentType($data)) {
                return $this->transaction($data, $customer_id);
            } else {
                return notFoundResponse('Can not allow to use payment rather than store credit');
            }
        }catch (\Exception $e){
            return notFoundResponse($e->getMessage());
        }
    }

    public function transaction($data, $customer_id){
        $order = $this->saveOrderData($data);
        try {
            if ($order){
                $chargeJson = (new StripePayment())->chargeCard($order->customer, $order->id, $order->total);
                if($chargeJson['amount_refunded'] == 0 && empty($chargeJson
                    ['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){
                    $this->deleteCustomerCartDataAfterCheckout($customer_id);
                    return successResponseWithoutData('Transaction successful');
                }else{
                    return successResponseWithoutData('Does not have enough money');
                }
            }else{
                return notFoundResponse('Fail Transaction');
            }
        }catch (\Exception $e){
            $order->delete();
            return notFoundResponse($e->getMessage());
        }
    }

    private function preparedData($data){
        $customer_id = 1;
        $totalPrice = 0;
        $cartService = new CartService;
        $customerItems = $cartService->getCustomerItems($customer_id);

        if (!empty($customerItems->toArray())) {
            $totalPrice = $cartService->getTotalPurchase($customerItems);
        }

        $data['total'] = $totalPrice;
        $data['customer_id'] = $customer_id;
        $data['address'] = isset($data['address']) ? $data['address'] : null;
        $data['telephone'] = isset($data['telephone']) ? $data['telephone'] : null;

        return $data;
    }

    private function saveOrderData($data){
        $data = $this->preparedData($data);
        $order = Order::create($data);

        return $order;
    }

    private function deleteCustomerCartDataAfterCheckout($customer_id){
        Cart::query()->where('customer_id','=',$customer_id)->delete();
    }
}
