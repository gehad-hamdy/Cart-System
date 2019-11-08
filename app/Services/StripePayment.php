<?php


namespace App\Services;


class StripePayment
{
    private function setApiKey(){
        \Stripe\Stripe::setApiKey(config('payments.stripe.Secret_key'));
        \Stripe\Stripe::setVerifySslCerts(false);
    }

    public function createCustomer($customer){
      return $customer = \Stripe\Customer::create([
            'description' => 'Customer for jenny.rosen@example.com',
             'email' => $customer->email
        ]);
    }
    public function chargeCard($customer, $orderID, $price){
        $this->setApiKey();
        $customerStrip = $this->createCustomer($customer);
        //charge a credit or a debit card
         $charge = \Stripe\Charge::create(array(
            'customer' => $customerStrip->id,
            'amount'   => $price,
            'currency' => 'US',
            'metadata' => array(
                'order_id' => $orderID
            )
        ));

        return $chargeJson = $charge->jsonSerialize();
    }
}
