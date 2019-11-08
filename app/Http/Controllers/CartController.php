<?php

namespace App\Http\Controllers;

use App\Services\CartService;

class CartController extends Controller
{
    private $cartService;
    private $customer_id;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->customer_id = 1;
    }

    public function cartItem(){
        return $this->cartService->cartItems($this->customer_id);
    }
}
