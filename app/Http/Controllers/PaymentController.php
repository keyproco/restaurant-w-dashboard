<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Customer;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        $customer = Customer::create([
            'email' => $request->StripeEmail,
            'source' => $request->stripeToken,
        ]);
        Charge::create([
            'amount' => 4200,
            'currency' => 'usd',
            'customer' => $customer->id]);
        return 'Paid';

    }
}
