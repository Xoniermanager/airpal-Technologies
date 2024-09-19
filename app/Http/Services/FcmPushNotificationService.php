<?php

namespace App\Http\Services;

use App\Models\User;



class FcmPushNotificationService
{
    public static function sendPushNotification($userId, $messageBody)
    {   
        $accessToken = self::getAccessToken();
        $deviceToken = self::getDeviceToken($userId);
        $apiUrl = 'https://fcm.googleapis.com/v1/projects/airpal-8405a/messages:send';
        
        $headers = [
             "Authorization: Bearer $accessToken",
             'Content-Type: application/json'
        ];
        
        $data['data'] =  $messageBody;
        $data['token'] = $deviceToken; // Retrive fcm_token from users table
    
        $payload['message'] = $data;
        $payload = json_encode($payload);
        // dd($payload);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_exec($ch);

        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if ($http_status == 200) 
        {
            return [
                'status'    =>  true,
                'message'   =>  'Notification sent'
            ];
        }
        else
        {
            return [
                'status'    =>  false,
                'message'   =>  curl_error($ch)
            ];
        }
    }

    public static function getAccessToken()
    {
        $credentialsFilePath = base_path() . "/fcm-cred.json";
        $client = new \Google_Client();
        $client->setAuthConfig($credentialsFilePath);
        $client->addScope('https://www.googleapis.com/auth/firebase.messaging');

        if($client->isAccessTokenExpired())
        {
            $token = $client->fetchAccessTokenWithAssertion();
        }
        else
        {
            $token = $client->getAccessToken();
        }
        
        // dd($token);
        $accessToken = $token['access_token'];
        return $accessToken;
    }

    public static function getDeviceToken($userId)
    {
        return 'frjAq6BzRD6ejq1pr-ISqD:APA91bGD84NP_YDrXz1UZITvSoc3ehw5g0UxOFe_F4CxyGRpSFokyJbib5ukyt78-OILahDVNATOiT-LkuV6dt7WqeUKNs8BuGuiMn34SuX1XlYbcTdh-Y8eRmbuSeTFEEpJWTqgQd8K';
        return User::find($userId)->device_token;
    }

}