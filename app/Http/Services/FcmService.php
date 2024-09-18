<?php

namespace App\Http\Services;

use App\Http\Repositories\BookingRepository;

class FcmService
{
    private $bookingRepository;
    
    public function __construct(BookingRepository $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function getAccessToken()
    {
        $credentialsFilePath = "firebase/fcm.json";
        $client = new \Google_Client();
        $client->setAuthConfig($credentialsFilePath);
        $client->addScope('https://www.googleapis.com/auth/firebase.messaging');
        $apiurl = 'https://fcm.googleapis.com/v1/projects/<PROJECT_ID>/messages:send';
        $client->refreshTokenWithAssertion();
        $token = $client->getAccessToken();
        $access_token = $token['access_token'];
    }

}