<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class NotificationHelper
{

    public static function sendPush($receiverId, $subjectId, $notificationType, $notificationData, $source = 'Landing')
    {
        try {
            $url = env('API_URL') . '/push/send';
            $response = Http::post($url, [
                'receiver_id' => $receiverId,
                'subject_id' => $subjectId,
                'notification_type' => $notificationType,
                'notification_data' => $notificationData,
                'source' => $source
            ]);
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
