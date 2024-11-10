<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripeController extends Controller
{
    public function createCheckoutSession(Request $request)
    {
        // Set your secret key
        Stripe::setApiKey(env(''));

        $totalAmount = $request->totalAmount;
        $description = $request->description;

        // Create checkout session
        try {
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd', // Change to your currency
                            'product_data' => [
                                'name' => 'Order Payment',
                                'description' => $description,
                            ],
                            'unit_amount' => $totalAmount * 100, // Amount in cents
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('checkout.success'),
                'cancel_url' => route('checkout.cancel'),
            ]);

            return response()->json(['sessionId' => $session->id]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
