<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Berkayk\OneSignal\OneSignalFacade as OneSignal;

class NotificationApiController extends Controller
{
    public function sendToAll(Request $request)
    {
        $message = $request->input("message", "Varsayılan bildirim");

        OneSignal::sendNotificationToAll(
            $message,
            null,
            null,
            null,
            null,
            ['TTL' => 3600]
        );

        return response()->json(['message' => 'Bildirim gönderildi']);
    }
}
