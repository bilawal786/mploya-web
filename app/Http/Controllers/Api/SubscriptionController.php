<?php

namespace App\Http\Controllers\Api;

use App\Subscription;
use Illuminate\Http\Request;
use App\PruchasedSubscription;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\SubscriptionResource;
use App\Http\Resources\SubscrioptionCollection;
use App\Http\Resources\PurchasedSubscriptionCollection;

class SubscriptionController extends Controller
{
    public $successStatus = 200;

    // Get All Subscription 

    public function AllSubscription()
    {

        $user_type = Auth::guard('api')->user()->user_type;
        if ($user_type == 'employer') {
            $scriptions = Subscription::all();
            $data = SubscrioptionCollection::collection($scriptions);
            return response()->json(SubscrioptionCollection::collection($data));
        } else {
            return response()->json(['error' => 'You Are Not Able To Get All Subscriptions', 'success' => false], 404);
        }
    }


    // // Single Subscription 
    public function SingleSubscription($id)
    {
        $subscription = Subscription::find($id);
        if ($subscription) {
            $data = new SubscriptionResource($subscription);
            return $data->toJson();
        } else {
            return response()->json(['error' => 'Subscription Not Found', 'success' => false], 404);
        }
    }

    //  Purchase and upgrate Subscription

    public function PurchaseSubscription(Request $request)
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
                return redirect()->route('payment');
            } else {
                $purchasedsubscription = PruchasedSubscription::where('employer_id', '=', $employer_id)->first();
                $purchasedsubscription->valid_job += $request->valid_job;
                $purchasedsubscription->update();
                return redirect()->route('payment');
            }
        } else {
            return response()->json(['error' => 'You Are Not Able To Purchase the Subscriptions', 'success' => false], 404);
        }
    }


    // Get current Purchesed Subscription 

    public function CurrentPruchasedSubscription()
    {

        $user_type = Auth::guard('api')->user()->user_type;
        $employer_id = Auth::guard('api')->user()->id;
        if ($user_type == 'employer') {
            $PruchasedSubscription = PruchasedSubscription::where('employer_id', '=', $employer_id)->get();
            if ($PruchasedSubscription->isEmpty()) {
                return response()->json(['error' => 'Pruchased Subscription Not Found', 'success' => false], 404);
            } else {
                $data = PurchasedSubscriptionCollection::collection($PruchasedSubscription);
                return response()->json(PurchasedSubscriptionCollection::collection($data));
            }
        } else {
            return response()->json(['error' => 'You Are Not Able To Get All Pruchased Subscription', 'success' => false], 404);
        }
    }
}
