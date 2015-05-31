<?php
/**
 * Created by PhpStorm.
 * User: fliak
 * Date: 31.5.15
 * Time: 10.51
 */

namespace Soil\OnSiteNotification\Service;


use Soil\NotificationBundle\Entity\PendingNotification;

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