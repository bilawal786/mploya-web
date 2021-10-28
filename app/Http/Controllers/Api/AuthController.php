<?php

namespace App\Http\Controllers\Api;

use App\ChatHistory;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\ForgotPasswordNotification;

class AuthController extends Controller
{
    public $successStatus = 200;
    public function forgot_password(Request $request)
    {


        $otp = mt_rand(100000, 999999);
        $user = User::where('email', '=', $request->email)->first();
        if ($user != null) {
            $user->otp = $otp;
            $user->update();
            $user->notify(new ForgotPasswordNotification($otp));
            $success['message'] = 'Otp Send Successfully On Your Email';
            $success['success'] = true;
            return response()->json($success, $this->successStatus);
        } else {
            return response()->json(['error' => 'Email Not Found', 'success' => false], 401);
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
                $success['token'] =  $user->createToken('MyApp')->accessToken;
                $success['success'] = true;
                $success['id'] =  $user->id;
                return response()->json($success, $this->successStatus);
            } else {

                return response()->json(['error' => 'Otp Not Match, Please Try Again', 'success' => false], 401);
            }
        } else {
            return response()->json(['error' => 'User Not Found', 'success' => false], 404);
        }
    }


    public function reset_password(Request $request)
    {
        $input = $request->all();
        $userEmail = $input['email'];
        User::where('email', $userEmail)->update(['password' => Hash::make($input['new_password'])]);
        $success['message'] = 'Password updated successfully';
        $success['success'] = true;
        return response()->json($success, 200);
    }
    public function chatHistory(Request $request){
        $chatHistory = new ChatHistory();
        $chatHistory->s_id = $request->s_id;
        $chatHistory->r_id = $request->r_id;
        $chatHistory->save();
        return response()->json(['success' => true], 200);
    }
    public function chatHistoryGet(){
        $chatHistory = ChatHistory::where('s_id', Auth::guard('api')->user()->id)->pluck('r_id')->toArray();
        $chatHistory1 = ChatHistory::where('r_id', Auth::guard('api')->user()->id)->pluck('s_id')->toArray();
        $usersIds = array_merge($chatHistory, $chatHistory1);
        $users = User::whereIn('id', $usersIds)->select('name', 'image')->get()->toArray();
        return response()->json($users);
    }
}
