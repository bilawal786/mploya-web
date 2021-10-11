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
        return view('payment.payment', ['id' => $id, 'userid' => $userid]);
    }

    public function StripePayment(Request $request)
    {

        $purchasedsubscription = PruchasedSubscription::where('employer_id', '=', $request->userid)->first();
        if ($purchasedsubscription == null) {
            $subscription = new PruchasedSubscription();
            $subscription->employer_id = $request->userid;
            $subscription->title = $request->title;
            $subscription->price = $request->price;
            $subscription->valid_job = $request->valid_job;
            $subscription->status = $request->status;
            $subscription->color = $request->color;
            $subscription->description = $request->description;
            $subscription->save();
        } else {
            $purchasedsubscription = PruchasedSubscription::where('employer_id', '=', $request->userid)->first();
            $purchasedsubscription->valid_job += $request->valid_job;
            $purchasedsubscription->update();
        }

        $subscription = Subscription::find($request->subscription_id);
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $cahrge = \Stripe\Charge::create([
            "amount" => $subscription->price * 100,
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
