<?php

namespace App\Http\Controllers;

use App\Subscription;
use Stripe\Stripe;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function Payment($id)
    {

        return view('payment.payment', ['id' => $id]);
    }

    public function StripePayment(Request $request)
    {

        $subscription = Subscription::find($request->subscription_id);
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $cahrge = \Stripe\Charge::create([
            "amount" => $subscription->price * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
        ]);
        return redirect()->route('payment.success');
    }


    public function PaymentSuccess()
    {
        return view('payment.success');
    }
}
