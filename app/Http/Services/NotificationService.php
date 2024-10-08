<?php

namespace App\Http\Services;
use App\Http\Repositories\NotificationRepository;

class NotificationService
{
    private  $notificationRepository;

    public function __construct(NotificationRepository $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    /**
     * Create a new notification save it to db
     * Send push notification to mobile user
     * Send push notification to web browser
     */
    public function saveNotification()
    {
        
    }

    /**
     * Send push notification on mobile to the used added in send_to
     */
    public function sendPushNotificationToMobile()
    {

    }

    /**
     * Send notification to web
     */
    public function sendNotificationToWeb()
    {

    }
}
