<?php
/**
 * Created by PhpStorm.
 * User: fliak
 * Date: 31.5.15
 * Time: 14.53
 */

namespace Soil\OnSiteNotificationBundle\Entity\ShowStrategy;

use Soil\OnSiteNotificationBundle\Entity\NotificationInterface;
use Soil\OnSiteNotificationBundle\Entity\PendingNotification;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * Class QuantityLimitedShowStrategy
 * @package Soil\OnSiteNotificationBundle\ShowStrategy
 *
 * @ODM\EmbeddedDocument
 */
class QuantityLimitedShowStrategy implements ShowStrategyInterface {

    /**
     * @var int
     * @ODM\Int
     */
    protected $showLimit;


    /**
     * @return int
     */
    public function getShowLimit()
    {
        return $this->showLimit;
    }

    /**
     * @param int $showLimit
     */
    public function setShowLimit($showLimit)
    {
        $this->showLimit = $showLimit;
    }



    public function apply(NotificationInterface $notification)    {
        if ($notification->getShownTimes() >= $this->getShowLimit())    {
            $notification->setArchive(true);
            return false;
        }

        return true;
    }


    public function getAsArray() {
        return [
            'show_limit' => $this->getShowLimit()
        ];
    }


} 