<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;
use App\PruchasedSubscription;
use Illuminate\Support\Facades\Auth;



class PaymentController extends Controller
{
    public function Payment($id)
    {
        return view('payment.payment', ['id' => $id]);
    }

    public function StripePayment(Request $request)
    {
        $user_type = Auth::guard('api')->user()->user_type;
        $employer_id = Auth::guard('api')->user()->id;
        $purchasedsubscription = PruchasedSubscription::where('employer_id', '=', $employer_id)->first();
        if ($user_type == 'employer') {
            if ($purchasedsubscription == null) {
                $subscription = new PruchasedSubscription();
                $subscription->employer_id = $employer_id;
                $subscription->title = $request->title;
                $subscription->price = $request->price;
                $subscription->valid_job = $request->valid_job;
                $subscription->status = $request->status;
                $subscription->color = $request->color;
                $subscription->description = $request->description;
                $subscription->save();
            } else {
                $purchasedsubscription = PruchasedSubscription::where('employer_id', '=', $employer_id)->first();
                $purchasedsubscription->valid_job += $request->valid_job;
                $purchasedsubscription->update();
            }
        } else {
            return response()->json(['error' => 'You Are Not Able To Purchase the Subscriptions', 'success' => false], 404);
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
