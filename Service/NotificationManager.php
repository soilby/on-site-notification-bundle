<?php
/**
 * Created by PhpStorm.
 * User: fliak
 * Date: 31.5.15
 * Time: 10.51
 */

namespace Soil\OnSiteNotificationBundle\Service;



use Soil\OnSiteNotificationBundle\Entity\PendingNotification;

class NotificationManager {

    protected $dm;

    public function __construct($dm)    {
        $this->dm = $dm;
    }

    public function factory()   {
        $notification = new PendingNotification();


        return $notification;
    }

    public function persist($notification)  {

    }
} 