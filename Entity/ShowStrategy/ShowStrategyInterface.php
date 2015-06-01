<?php
/**
 * Created by PhpStorm.
 * User: fliak
 * Date: 1.6.15
 * Time: 10.48
 */

namespace Soil\OnSiteNotificationBundle\Entity\ShowStrategy;


use Soil\OnSiteNotificationBundle\Entity\NotificationInterface;

interface ShowStrategyInterface {

    const CONTROL_SIDE_CLIENT = 'client';
    const CONTROL_SIDE_SERVER = 'server';

    public function apply(NotificationInterface $notification);

    public function getAsArray();

}