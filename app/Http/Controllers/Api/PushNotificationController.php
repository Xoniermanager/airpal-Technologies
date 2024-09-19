<?php

namespace App\Http\Controllers\Api;

use Exception;
use Illuminate\Http\Request;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveDeviceTokenRequest;
use App\Http\Services\FcmPushNotificationService;

class PushNotificationController extends Controller
{
    private $userServices;

    public function __construct(UserServices $userServices)
    {
        $this->userServices = $userServices;
    }

    public function send()
    {
        $notificationSent = FcmPushNotificationService::sendPushNotification(2,[
            'body'  =>  'test body',
            'title' =>  'test title'
        ]);
        dd($notificationSent);
    }
    /**
     * Save device token to send push notification on mobile
     * @param user_id
     * @param device_token
     * @return true/false
     */
    public function saveDeviceToken(SaveDeviceTokenRequest $request)
    {
        try{
            $email = $request->email;
            $deviceToken = $request->token;
            $updated = $this->userServices->updateDeviceToken($email, $deviceToken);

            if($updated)
            {
                return response()->json([
                    'status'    =>  true,
                    'message'   =>  'Device token updated successfully!'
                ],200);
            }
            else
            {
                return response()->json([
                    'status'    =>  false,
                    'message'   =>  'Something went wrong, can not update device token.'
                ],400);
            }
        } catch(Exception $e){
            return response()->json([
                'status'    =>  false,
                'error'     =>  $e->getMessage(),
                'message'   =>  'Can not update device token.'
            ], 500);
        }
    }
}
