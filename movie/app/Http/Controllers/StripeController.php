<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\User;
use Exception;
use Stripe\Subscription;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Illuminate\Routing\Controller;

class StripeController extends Controller
{
    public function viewPlans()
    {
        $paymentIntend = [];
        return view('plans.plan');
    }



    public function session(Request $request)
    {
        try {
            $planValue = $request->input('plan_value');
            if ($planValue == 1) {
                $amt = 650000;
            } elseif ($planValue == 2) {
                $amt = 850000;
            } else {
                $amt = 120000;
            }
            $stripe = new \Stripe\StripeClient(env('STRIPE_SK'));
            $paymentIntend = $stripe->paymentIntents->create([
                'amount' => $amt,
                'currency' => 'mmk',
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
            ]);
            return view('plans.plan', compact('paymentIntend'));
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function success()
    {
        return redirect();
    }
}
