<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Cart;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Stripe\Exception\ApiErrorException;

class CheckoutController extends Controller
{
    //checkout
    public function stripeCheckout(Request $request){
        // dd($request->all());
        \Stripe\Stripe::setApiKey("sk_test_51NOMEtHBjy5dEZKOKjurHsIkP76QrgovhhNDXmmMr6zNV4XRNjE82ooOyxpDAeIxAVAFgLC88OIv7mnFwK9tRZBy00UrizZOxz");

        $intent = null;
        try {
            if($request->payment_method_id){
                //create payment intent
                $intent = \Stripe\PaymentIntent::create([
                    'payment_method' => $request->payment_method_id,
                    'amount' => Cart::totalAmount(),
                    'currency' => 'usd',
                    'confirmation_method' => 'manual',
                    'confirm' => true,
                ]);
            }
            if($request->payment_intent_id){
                $intent = \Stripe\PaymentIntent::retrieve(
                    $request->payment_intent_id
                );
                $intent->confirm();
            }
        } catch (\Stripe\Exception\ApiErrorException $e) {
            //display error for user on the screen
            echo json_encode([
                'error' => $e->getMessage()
            ]);
        }
        return redirect()-> route('success');

    }
}
