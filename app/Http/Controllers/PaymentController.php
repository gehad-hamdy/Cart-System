<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    Private $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function confirmTransaction(Request $request){
        $customer_id = 1;
        return $this->paymentService->confirmTransaction($request->all(), $customer_id);
    }
}
