<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
                $success['token'] =  $user->createToken('MyApp')->accessToken;
                $success['name'] =  $user->name;
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

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'user_type' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'success' => false], 401);
        }
        $otp = mt_rand(100000, 999999);
        $user =  User::create([
            'otp' => $otp,
            'name' => $request->name,
            'email' => $request->email,
            'user_type' => $request->user_type,
            'password' => Hash::make($request->password),
        ]);
        $success['name'] =  $user->name;
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

                return response()->json(['error' => 'Not Varified, Please Try Again', 'success' => false], 401);
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
                    $user->email = $request->email;
                    $user->user_type =  $request->user_type;
                    $user->provider_id = $request->provider_id;
                    $user->provider_name = $request->provider_name;
                    $user->varify_email = 1;
                    $success['token'] =  $user->createToken('MyApp')->accessToken;
                    $success['success'] = true;
                    $user->save();
                    return response()->json($success, $this->successStatus);
                } else {
                    $success['token'] =  $user->createToken('MyApp')->accessToken;
                    $success['success'] = true;
                    $success['name'] =  $user->name;
                    return response()->json($success, $this->successStatus);
                }
            } else {
                if (!$user) {
                    $user = new User();
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->user_type =  $request->user_type;
                    $user->provider_id = $request->provider_id;
                    $user->provider_name = $request->provider_name;
                    $user->varify_email = 1;
                    $success['token'] =  $user->createToken('MyApp')->accessToken;
                    $success['success'] = true;
                    $user->save();
                    return response()->json($success, $this->successStatus);
                } else {
                    $success['token'] =  $user->createToken('MyApp')->accessToken;
                    $success['success'] = true;
                    $success['name'] =  $user->name;
                    return response()->json($success, $this->successStatus);
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
