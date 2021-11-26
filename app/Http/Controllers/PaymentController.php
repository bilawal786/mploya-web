<?php

namespace App\Http\Controllers;

use App\User;
use App\Language;
use App\Subscription;
use Illuminate\Http\Request;
use App\PruchasedSubscription;
use Illuminate\Support\Facades\Auth;



class PaymentController extends Controller
{
    public function Payment($id, $userid)
    {
        $json = file_get_contents("http://www.geoplugin.net/json.gp?ip=" . request()->ip());

        $details = json_decode($json);
        $country_code = $details->geoplugin_countryCode;

        switch ($country_code) {
            case "DJ":
            case "ER":
            case "ET":

                $lang = "aa";
                break;

            case "AE":
            case "BH":
            case "DZ":
            case "EG":
            case "IQ":
            case "JO":
            case "KW":
            case "LB":
            case "LY":
            case "MA":
            case "OM":
            case "QA":
            case "SA":
            case "SD":
            case "SY":
            case "TN":
            case "YE":

                $lang = "ar";
                break;

            case "AZ":

                $lang = "az";
                break;

            case "BY":

                $lang = "be";
                break;

            case "BG":

                $lang = "bg";
                break;

            case "BD":

                $lang = "bn";
                break;

            case "BA":

                $lang = "bs";
                break;

            case "CZ":

                $lang = "cs";
                break;

            case "DK":

                $lang = "da";
                break;

            case "AT":
            case "CH":
            case "DE":
            case "LU":

                $lang = "de";
                break;

            case "MV":

                $lang = "dv";
                break;

            case "BT":

                $lang = "dz";
                break;

            case "GR":

                $lang = "el";
                break;

            case "AG":
            case "AI":
            case "AQ":
            case "AS":
            case "AU":
            case "BB":
            case "BW":
            case "CA":
            case "GB":
            case "IE":
            case "KE":
            case "NG":
            case "NZ":
            case "PH":
            case "SG":
            case "US":
            case "ZA":
            case "ZM":
            case "ZW":

                $lang = "en";
                break;

            case "AD":
            case "AR":
            case "BO":
            case "CL":
            case "CO":
            case "CR":
            case "CU":
            case "DO":
            case "EC":
            case "ES":
            case "GT":
            case "HN":
            case "MX":
            case "NI":
            case "PA":
            case "PE":
            case "PR":
            case "PY":
            case "SV":
            case "UY":
            case "VE":

                $lang = "es";
                break;

            case "EE":

                $lang = "et";
                break;

            case "IR":

                $lang = "fa";
                break;

            case "FI":

                $lang = "fi";
                break;

            case "FO":

                $lang = "fo";
                break;

            case "BE":
            case "FR":
            case "SN":

                $lang = "fr";
                break;

            case "IL":

                $lang = "he";
                break;

            case "IN":

                $lang = "hi";
                break;

            case "HR":

                $lang = "hr";
                break;

            case "HT":

                $lang = "ht";
                break;

            case "HU":

                $lang = "hu";
                break;

            case "AM":

                $lang = "hy";
                break;

            case "ID":

                $lang = "id";
                break;

            case "IS":

                $lang = "is";
                break;

            case "IT":

                $lang = "it";
                break;

            case "JP":

                $lang = "ja";
                break;

            case "GE":

                $lang = "ka";
                break;

            case "KZ":

                $lang = "kk";
                break;

            case "GL":

                $lang = "kl";
                break;

            case "KH":

                $lang = "km";
                break;

            case "KR":

                $lang = "ko";
                break;

            case "KG":

                $lang = "ky";
                break;

            case "UG":

                $lang = "lg";
                break;

            case "LA":

                $lang = "lo";
                break;

            case "LT":

                $lang = "lt";
                break;

            case "LV":

                $lang = "lv";
                break;

            case "MG":

                $lang = "mg";
                break;

            case "MK":

                $lang = "mk";
                break;

            case "MN":

                $lang = "mn";
                break;

            case "MY":

                $lang = "ms";
                break;

            case "MT":

                $lang = "mt";
                break;

            case "MM":

                $lang = "my";
                break;

            case "NP":

                $lang = "ne";
                break;

            case "AW":
            case "NL":

                $lang = "nl";
                break;

            case "NO":

                $lang = "no";
                break;

            case "PL":

                $lang = "pl";
                break;

            case "AF":

                $lang = "ps";
                break;

            case "AO":
            case "BR":
            case "PT":

                $lang = "pt";
                break;

            case "RO":

                $lang = "ro";
                break;

            case "RU":
            case "UA":

                $lang = "ru";
                break;

            case "RW":

                $lang = "rw";
                break;

            case "AX":

                $lang = "se";
                break;

            case "SK":

                $lang = "sk";
                break;

            case "SI":

                $lang = "sl";
                break;

            case "SO":

                $lang = "so";
                break;

            case "AL":

                $lang = "sq";
                break;

            case "ME":
            case "RS":

                $lang = "sr";
                break;

            case "SE":

                $lang = "sv";
                break;

            case "TZ":

                $lang = "sw";
                break;

            case "LK":

                $lang = "ta";
                break;

            case "TJ":

                $lang = "tg";
                break;

            case "TH":

                $lang = "th";
                break;

            case "TM":

                $lang = "tk";
                break;

            case "CY":
            case "TR":

                $lang = "tr";
                break;

            case "PK":

                $lang = "ur";
                break;

            case "UZ":

                $lang = "uz";
                break;

            case "VN":

                $lang = "vi";
                break;

            case "CN":
            case "HK":
            case "TW":

                $lang = "zh";
                break;

            default:
                break;
        }

        //$language = Language::where('code', '=',  $lang)->first();
        $language = Language::where('code', '=',  'es')->first();

        if ($language) {
            $success['language'] = $language;
            return view('payment.payment', ['subscriptioniId' => $id, 'userid' => $userid, 'languaged' => $language]);
        } else {
            $languaged = Language::where('code', '=',  'en')->first();
            return view('payment.payment', ['subscriptioniId' => $id, 'userid' => $userid, 'languaged' => $languaged]);
        }
    }



    public function StripePayment(Request $request)
    {
        $sub = Subscription::find($request->subscriptioniId);
        $purchasedsubscription = PruchasedSubscription::where('employer_id', '=', $request->userid)->first();
        if ($purchasedsubscription == null) {
            $subscription = new PruchasedSubscription();
            $subscription->employer_id = $request->userid;
            $subscription->subscription_id = $sub->id;
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
        $json = file_get_contents("http://www.geoplugin.net/json.gp?ip=" . request()->ip());
        $details = json_decode($json);
        $country_code = $details->geoplugin_countryCode;

        switch ($country_code) {
            case "DJ":
            case "ER":
            case "ET":

                $lang = "aa";
                break;

            case "AE":
            case "BH":
            case "DZ":
            case "EG":
            case "IQ":
            case "JO":
            case "KW":
            case "LB":
            case "LY":
            case "MA":
            case "OM":
            case "QA":
            case "SA":
            case "SD":
            case "SY":
            case "TN":
            case "YE":

                $lang = "ar";
                break;

            case "AZ":

                $lang = "az";
                break;

            case "BY":

                $lang = "be";
                break;

            case "BG":

                $lang = "bg";
                break;

            case "BD":

                $lang = "bn";
                break;

            case "BA":

                $lang = "bs";
                break;

            case "CZ":

                $lang = "cs";
                break;

            case "DK":

                $lang = "da";
                break;

            case "AT":
            case "CH":
            case "DE":
            case "LU":

                $lang = "de";
                break;

            case "MV":

                $lang = "dv";
                break;

            case "BT":

                $lang = "dz";
                break;

            case "GR":

                $lang = "el";
                break;

            case "AG":
            case "AI":
            case "AQ":
            case "AS":
            case "AU":
            case "BB":
            case "BW":
            case "CA":
            case "GB":
            case "IE":
            case "KE":
            case "NG":
            case "NZ":
            case "PH":
            case "SG":
            case "US":
            case "ZA":
            case "ZM":
            case "ZW":

                $lang = "en";
                break;

            case "AD":
            case "AR":
            case "BO":
            case "CL":
            case "CO":
            case "CR":
            case "CU":
            case "DO":
            case "EC":
            case "ES":
            case "GT":
            case "HN":
            case "MX":
            case "NI":
            case "PA":
            case "PE":
            case "PR":
            case "PY":
            case "SV":
            case "UY":
            case "VE":

                $lang = "es";
                break;

            case "EE":

                $lang = "et";
                break;

            case "IR":

                $lang = "fa";
                break;

            case "FI":

                $lang = "fi";
                break;

            case "FO":

                $lang = "fo";
                break;

            case "BE":
            case "FR":
            case "SN":

                $lang = "fr";
                break;

            case "IL":

                $lang = "he";
                break;

            case "IN":

                $lang = "hi";
                break;

            case "HR":

                $lang = "hr";
                break;

            case "HT":

                $lang = "ht";
                break;

            case "HU":

                $lang = "hu";
                break;

            case "AM":

                $lang = "hy";
                break;

            case "ID":

                $lang = "id";
                break;

            case "IS":

                $lang = "is";
                break;

            case "IT":

                $lang = "it";
                break;

            case "JP":

                $lang = "ja";
                break;

            case "GE":

                $lang = "ka";
                break;

            case "KZ":

                $lang = "kk";
                break;

            case "GL":

                $lang = "kl";
                break;

            case "KH":

                $lang = "km";
                break;

            case "KR":

                $lang = "ko";
                break;

            case "KG":

                $lang = "ky";
                break;

            case "UG":

                $lang = "lg";
                break;

            case "LA":

                $lang = "lo";
                break;

            case "LT":

                $lang = "lt";
                break;

            case "LV":

                $lang = "lv";
                break;

            case "MG":

                $lang = "mg";
                break;

            case "MK":

                $lang = "mk";
                break;

            case "MN":

                $lang = "mn";
                break;

            case "MY":

                $lang = "ms";
                break;

            case "MT":

                $lang = "mt";
                break;

            case "MM":

                $lang = "my";
                break;

            case "NP":

                $lang = "ne";
                break;

            case "AW":
            case "NL":

                $lang = "nl";
                break;

            case "NO":

                $lang = "no";
                break;

            case "PL":

                $lang = "pl";
                break;

            case "AF":

                $lang = "ps";
                break;

            case "AO":
            case "BR":
            case "PT":

                $lang = "pt";
                break;

            case "RO":

                $lang = "ro";
                break;

            case "RU":
            case "UA":

                $lang = "ru";
                break;

            case "RW":

                $lang = "rw";
                break;

            case "AX":

                $lang = "se";
                break;

            case "SK":

                $lang = "sk";
                break;

            case "SI":

                $lang = "sl";
                break;

            case "SO":

                $lang = "so";
                break;

            case "AL":

                $lang = "sq";
                break;

            case "ME":
            case "RS":

                $lang = "sr";
                break;

            case "SE":

                $lang = "sv";
                break;

            case "TZ":

                $lang = "sw";
                break;

            case "LK":

                $lang = "ta";
                break;

            case "TJ":

                $lang = "tg";
                break;

            case "TH":

                $lang = "th";
                break;

            case "TM":

                $lang = "tk";
                break;

            case "CY":
            case "TR":

                $lang = "tr";
                break;

            case "PK":

                $lang = "ur";
                break;

            case "UZ":

                $lang = "uz";
                break;

            case "VN":

                $lang = "vi";
                break;

            case "CN":
            case "HK":
            case "TW":

                $lang = "zh";
                break;

            default:
                break;
        }

        //$language = Language::where('code', '=',  $lang)->first();
        $language = Language::where('code', '=',  'es')->first();

        if ($language) {
            $success['language'] = $language;
            return view('payment.success', ['languaged' => $language]);
        } else {
            $languaged = Language::where('code', '=',  'en')->first();
            return view('payment.success', ['languaged' => $languaged]);
        }
    }
}
