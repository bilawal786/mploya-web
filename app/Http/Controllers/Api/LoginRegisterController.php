<?php

namespace App\Http\Controllers\Api;

use App\User;
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
        $loc = explode(',', $data->loc);
        $latitude = $loc[0];
        $longitude = $loc[1];
        $lat = floatval($latitude);
        $lng = floatval($longitude);

        $rules = array('email' => 'required|email|unique:users');
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            $invalid = $error->errors()->all()[0];
            $message['error'] = $invalid;
            return response()->json($message, 401);
        }


        if (!$request->name) {
            $success['error'] = "Name is Required ";
            $success['success'] = false;
            return response()->json($success, 401);
        } elseif (!$request->user_type) {
            $success['error'] = "User Type is Required ";
            $success['success'] = false;
            return response()->json($success, 401);
        }
        $otp = mt_rand(100000, 999999);
        $user =  User::create([
            'deviceToken' => $request->deviceToken,
            'latitude' => $lat,
            'longitude' => $lng,
            'otp' => $otp,
            'name' => $request->name,
            'email' => $request->email,
            'user_type' => $request->user_type,
            'password' => Hash::make($request->password),
        ]);
        $success['id'] =  $user->id;
        $success['deviceToken'] =  $user->deviceToken;
        $success['name'] =  $user->name;
        $success['image'] =  $user->image;
        $success['success'] = true;
        $success['message'] = 'Otp Send Successfully On Your Email';
        $user->notify(new EmailVerifyNotification($otp));
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
                return response()->json(['error' => 'Your Account is Register But Not Social ', 'success' => false], 401);
            }
        }
    }
}
