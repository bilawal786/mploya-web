<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use TheSeer\Tokenizer\Exception;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Notifications\ForgotPasswordNotification;

class AuthController extends Controller
{
    public $successStatus = 200;
    public function forgot_password(Request $request)
    {
        $input = $request->all();
        $rules = array(
            'email' => "required|email",
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid  Email', 'success' => false], 401);
        } else {

            $otp = mt_rand(1000000, 9999999);
            $user = User::where('email', '=', $request->email)->first();
            $user->otp = $otp;
            $user->update();
            if ($user) {
                $user->notify(new ForgotPasswordNotification($otp));
                $success['message'] = 'Otp Send Successfully On Your Email';
                $success['success'] = true;
                return response()->json($success, $this->successStatus);
            } else {
                return response()->json(['error' => 'Invalid  Email', 'success' => false], 401);
            }
        }
    }

    public function opt_verify(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if ($user->otp == $request->otp) {
                $user->varify_email = 1;
                $user->update();
                $success['message'] = 'Your Otp Varify Successfull';
                $success['success'] = true;
                return response()->json($success, $this->successStatus);
            } else {

                return response()->json(['error' => 'Not Varified, Please Try Again', 'success' => false], 401);
            }
        } else {
            return response()->json(['error' => 'User Not Found', 'success' => false], 404);
        }
    }


    public function reset_password(Request $request)
    {
        $input = $request->all();
        $userid = Auth::guard('api')->user()->id;
        $validator = Validator::make($request->all(), [
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'success' => false], 401);
        } else {
            User::where('id', $userid)->update(['password' => Hash::make($input['new_password'])]);
            $success['message'] = 'Password updated successfully';
            $success['success'] = true;
            return response()->json($success, 200);
        }
    }
}
