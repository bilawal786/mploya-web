<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Notifications\EmailVerifyNotification;


class LoginRegisterController extends Controller
{
    public $successStatus = 200;
    public function Login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password'), 'varify_email' => 1])) {
            $user = Auth::user();
            if ($user->user_type == request('user_type')) {
                $user->deviceToken = request('deviceToken');
                $user->update();
                $success['token'] =  $user->createToken('MyApp')->accessToken;
                $success['user_type'] =  $user->user_type;
                $success['name'] =  $user->name;
                $success['latitude'] =  $user->latitude;
                $success['longitude'] =  $user->longitude;
                $success['id'] =  $user->id;
                $success['image'] =  $user->image;
                $success['deviceToken'] = $user->deviceToken;
                $success['success'] = true;
                return response()->json($success);
            } else {
                return response()->json(['error' => 'You are Login as Different Account', 'success' => false], 401);
            }
        } elseif (Auth::attempt(['email' => request('email'), 'password' => request('password'), 'varify_email' => 0])) {
            return response()->json(['error' => 'Email Not Varified', 'success' => false], 401);
        } else {
            return response()->json(['error' => 'Invalid Login Credentials', 'success' => false], 401);
        }
    }


    // Sign Up With email Verify

    public function Signup(Request $request)
    {
        $response = Http::get('http://ipinfo.io/119.155.58.47/json');
        $data = $response->object();
        $countryCode = $data->country;
        $loc = explode(',', $data->loc);
        $latitude = $loc[0];
        $longitude = $loc[1];
        $lat = floatval($latitude);
        $lng = floatval($longitude);
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
        $rules = array('email' => 'required|email|unique:users');
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            $invalid = $error->errors()->all()[0];
            $message['error'] = $invalid;
            return response()->json($message, 401);
        }


        if (!$request->name) {
            $success['error'] = "Name is Required";
            $success['success'] = false;
            return response()->json($success, 401);
        } elseif (!$request->user_type) {
            $success['error'] = "User Type is Required";
            $success['success'] = false;
            return response()->json($success, 401);
        }
        $otp = mt_rand(100000, 999999);
        $user =  User::[create]([
            'deviceToken' => $request->deviceToken,
            'latitude' => $lat,
            'longitude' => $lng,
            'otp' => $otp,
            'name' => $request->name,
            'countryCode' => $countryCode,
            'email' => $request->email,
            'user_type' => $request->user_type,
            'password' => Hash::make($request->password),
        ]);
        $success['id'] =  $user->id;
        $success['deviceToken'] =  $user->deviceToken;
        $success['name'] =  $user->name;
        $success['countryCode'] =  $user->countryCode;
        $success['image'] =  $user->image;
        $success['success'] = true;
        $success['message'] = 'Otp Send Successfully On Your Email';
        //$language = Language::where('code', '=',  $lang)->first();
        $language = Language::where('code', '=',  'es')->first();

        if ($language) {
            $lng = $language;
        } else {
            $language = Language::where('code', '=',  'en')->first();
            $lng = $language;
        }
        $user->notify(new EmailVerifyNotification($lng, $otp));
        return response()->json($success);
    }


    public function OptVerify(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if ($user->otp = $request->otp) {
                $user->varify_email = 1;
                $user->update();
                $success['message'] = 'Your Otp Varify Successfull';
                $success['token'] =  $user->createToken('MyApp')->accessToken;
                $success['success'] = true;
                return response()->json($success);
            } else {

                return response()->json(['error' => 'Otp Not Match, Please Try Again', 'success' => false], 401);
            }
        } else {
            return response()->json(['error' => 'Email Not Found, Please Try Again', 'success' => false], 401);
        }
    }


    // Social Register

    public function SocialRegister(Request $request)
    {

        $user = User::where('email', '=', $request->email)->where('provider_id', '=', $request->provider_id)->first();
        if ($request->provider_id) {
            if ($request->provider_name == 'google') {
                if (!$user) {
                    $user = new User();
                    $user->name = $request->name;
                    $user->deviceToken = $request->deviceToken;
                    $user->email = $request->email;
                    $user->user_type =  $request->user_type;
                    $user->provider_id = $request->provider_id;
                    $user->provider_name = $request->provider_name;
                    $user->varify_email = 1;
                    $user->save();
                    if ($request->user_type == $user->user_type) {
                        $success['id'] =  $user->id;
                        $success['name'] =  $user->name;
                        $success['image'] =  $user->image;
                        $success['token'] =  $user->createToken('MyApp')->accessToken;
                        $success['success'] = true;
                        return response()->json($success, $this->successStatus);
                    } else {
                        $success['success'] = false;
                        return response()->json($success, 200);
                    }
                } else {
                    if ($request->user_type == $user->user_type) {
                        $success['id'] =  $user->id;
                        $success['name'] =  $user->name;
                        $success['image'] =  $user->image;
                        $success['token'] =  $user->createToken('MyApp')->accessToken;
                        $success['success'] = true;
                        $success['name'] =  $user->name;
                        return response()->json($success, $this->successStatus);
                    } else {
                        $success['success'] = false;
                        return response()->json($success, 200);
                    }
                }
            } else {
                if (!$user) {
                    $user = new User();
                    $user->name = $request->name;
                    $user->deviceToken = $request->deviceToken;
                    $user->email = $request->email;
                    $user->user_type =  $request->user_type;
                    $user->provider_id = $request->provider_id;
                    $user->provider_name = $request->provider_name;
                    $user->varify_email = 1;
                    $user->save();
                    if ($request->user_type == $user->user_type) {
                        $success['id'] =  $user->id;
                        $success['name'] =  $user->name;
                        $success['image'] =  $user->image;
                        $success['token'] =  $user->createToken('MyApp')->accessToken;
                        $success['success'] = true;
                        return response()->json($success, $this->successStatus);
                    } else {
                        $success['success'] = false;
                        return response()->json($success, 200);
                    }
                } else {
                    if ($request->user_type == $user->user_type) {
                        $success['id'] =  $user->id;
                        $success['name'] =  $user->name;
                        $success['image'] =  $user->image;
                        $success['token'] =  $user->createToken('MyApp')->accessToken;
                        $success['success'] = true;
                        $success['name'] =  $user->name;
                        return response()->json($success, $this->successStatus);
                    } else {
                        $success['success'] = false;
                        return response()->json($success, 200);
                    }
                }
            }
        } else {
            $simple_register_user = User::where('email', '=', $request->email)->first();
            if ($simple_register_user) {
                return response()->json(['error' => 'Your Account is Register But Not Social', 'success' => false], 401);
            }
        }
    }
}
