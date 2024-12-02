<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function checkout()
    {
        return view('checkout'); // Créez une vue de checkout
    }

    public function processPayment(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $checkout_session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Plan Pro',
                    ],
                    'unit_amount' => 1000, // Montant en cents (10 USD)
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),
        ]);

        Payment::create([
            'user_model_id' => Auth::guard('lofran')->user()->id,
            'payment_id' => $checkout_session->id,
            'amount' => 10.00,
            'status' => 'paid',
        ]);
        

        return redirect($checkout_session->url);
    }

    public function success()
    {
        return view('paiement/success');
    }

    public function cancel()
    {
        return view('paiement/cancel');
    }
}
