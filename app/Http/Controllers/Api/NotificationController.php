<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationCollection;
use App\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function getNotification()
    {
        $notifications = Notification::where('reciever_id', '=', Auth::guard('api')->user()->id)->get();
        if ($notifications->isEmpty()) {
            return response()->json(['error' => 'Notification Not Found', 'success' => false], 401);
        } else {
            $data = NotificationCollection::collection($notifications);
            return response()->json(NotificationCollection::collection($data));
        }
    }
}
