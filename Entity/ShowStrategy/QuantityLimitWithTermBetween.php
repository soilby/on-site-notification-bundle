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
 * Class QuantityLimitWithTermBetween
 * @package Soil\OnSiteNotificationBundle\ShowStrategy
 *
 * @ODM\EmbeddedDocument
 */
class QuantityLimitWithTermBetween implements ShowStrategyInterface {


    /**
     * @var int
     * @ODM\Int
     */
    protected $termBetweenShow;


    /**
     * @var int
     * @ODM\Int
     */
    protected $showLimit;

    /**
     * @var string
     * @ODM\String
     */
    protected $termControlSide = ShowStrategyInterface::CONTROL_SIDE_SERVER;

    /**
     * @return mixed
     */
    public function getTermBetweenShow()
    {
        return $this->termBetweenShow;
    }

    /**
     * @param mixed $term
     */
    public function setTermBetweenShow($term)
    {
        $this->termBetweenShow = $term;
    }

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
            return false;
        }

        if ($this->getTermControlSide() === ShowStrategyInterface::CONTROL_SIDE_SERVER) {
            $now = time();
            $last = $notification->getLastExpositionDate();
            if ($last && $last instanceof \DateTime) {
                $last = $last->getTimestamp();

                $term = $this->getTermBetweenShow();

                if ($now - $last < $term) {
                    return false;
                }
            }
        }

        return true;


    }

    /**
     * @return string
     */
    public function getTermControlSide()
    {
        return $this->termControlSide;
    }

    /**
     * @param string $controlSide
     */
    public function setTermControlSide($controlSide)
    {
        $this->termControlSide = $controlSide;
    }


    public function getAsArray() {
        return [
            'term_between_show' => $this->getTermBetweenShow(),
            'show_limit' => $this->getShowLimit(),
            'term_control_side' => $this->getTermControlSide()
        ];
    }




} 