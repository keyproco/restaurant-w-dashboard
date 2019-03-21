<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function store()
    {
        // Customer::Charge();
        Stripe::setApiKey('');
        $customer = Customer::create([
            'email' => request('stripeEmail'),
            'source' => request('stripeToken'),
            'currency' => 'usd',
        ]);
        Charge::create([
            'amount' => 4200,
            'customer' => $customer->id]);
        Stripe::setApiKey('sk_test_BQokikJOvBiI2HlWgH4olfQ2');
        $charge = Charge::create(['amount' => 2000, 'currency' => 'usd', 'source' => 'tok_189fqt2eZvKYlo2CTGBeg6Uq']);
        echo $charge;

        return dd($request->all());
    }
}
