<?php

namespace App\Http\Controllers;

use App\User;
use App\Subscription;
use Illuminate\Http\Request;
use App\PruchasedSubscription;
use Illuminate\Support\Facades\Auth;



class PaymentController extends Controller
{
    public function Payment($id, $userid)
    {
        return view('payment.payment', ['subscriptioniId' => $id, 'userid' => $userid]);
    }

    public function StripePayment(Request $request)
    {
        $sub = Subscription::find($request->subscriptioniId);
        $purchasedsubscription = PruchasedSubscription::where('employer_id', '=', $request->userid)->first();
        if ($purchasedsubscription == null) {
            $subscription = new PruchasedSubscription();
            $subscription->employer_id = $request->userid;
            $subscription->title = $sub->title;
            $subscription->price = $sub->price;
            $subscription->valid_job = $sub->valid_job;
            $subscription->status = $sub->status;
            $subscription->color = $sub->color;
            $subscription->description = $sub->description;
            $subscription->save();
        } else {
            $purchasedsubscription = PruchasedSubscription::where('employer_id', '=', $request->userid)->first();
            $purchasedsubscription->valid_job += $sub->valid_job;
            $purchasedsubscription->update();
        }

        // $subscription = Subscription::find($request->subscriptioniId);
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $cahrge = \Stripe\Charge::create([
            "amount" => $sub->price * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Payment for Subscription Purchase."
        ]);
        return redirect()->route('payment.success');
    }
    public function PaymentSuccess()
    {
        return view('payment.success');
    }
}
