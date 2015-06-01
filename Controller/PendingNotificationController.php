<?php
/**
 * Created by PhpStorm.
 * User: fliak
 * Date: 31.5.15
 * Time: 9.52
 */

namespace Soil\OnSiteNotificationBundle\Controller;


use Soil\OnSiteNotificationBundle\Service\NotificationManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PendingNotificationController {

    /**
     * @var NotificationManager
     */
    protected $notificationManager;

    public function __construct($notificationManager)   {
        $this->notificationManager = $notificationManager;
    }


    public function getAgentNotificationAction(Request $request)    {
        $agent = $request->get('agent_uri');

        $pendingNotifications = $this->notificationManager->getForAgent($agent);

        $plainData = [];
        foreach ($pendingNotifications as $notification)    {
            $strategy = $notification->getShowStrategy();
            if ($strategy) {
                $needToBeShown = $strategy->apply($notification);
                if (!$needToBeShown) {
                    continue;
                }
            }

            $plainData[] = $this->notificationManager->serialiseNotification($notification);
        }

        $response = new JsonResponse($plainData);

        return $response;
    }

    public function setNotificationShownAction(Request $request)   {
        try {
            $id = $request->get('notification_id');
            $notification = $this->notificationManager->loadById($id);
            if (!$notification) throw new \Exception('Notification is missing');

            $showCount = $notification->wasShown();

            $strategy = $notification->getShowStrategy();
            if ($strategy)  {
                $strategy->apply($notification);
            }

            $this->notificationManager->flush();

            return new JsonResponse([
                'showCount' => $showCount,
                'success' => true
            ]);
        }
        catch(\Exception $e)    {

            return new JsonResponse([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }

    }
}