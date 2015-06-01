<?php
/**
 * Created by PhpStorm.
 * User: fliak
 * Date: 31.5.15
 * Time: 10.51
 */

namespace Soil\OnSiteNotificationBundle\Service;



use Doctrine\ODM\MongoDB\DocumentRepository;
use Soil\OnSiteNotificationBundle\Entity\PendingNotification;
use Soil\OnSiteNotificationBundle\Entity\ShowStrategy\OnEnterShowStrategy;
use Soil\OnSiteNotificationBundle\Entity\ShowStrategy\ShowStrategyInterface;

class NotificationManager {

    protected $dm;

    public function __construct($dm)    {
        $this->dm = $dm->getManager();
    }

    /**
     * @return PendingNotification
     */
    public function factory()   {
        $notification = new PendingNotification();

        return $notification;
    }

    public function persist($notification)  {
        $this->dm->persist($notification);
    }

    public function flush() {
        $this->dm->flush();
    }

    /**
     * @param $agentURI
     *
     * @return PendingNotification[]
     */
    public function getForAgent($agentURI, $onlyActive = true)  {

        $criteria = [
            'agentURI' => $agentURI
        ];

        if ($onlyActive)    {
            $criteria['archive'] = ['$ne' => true];
        }

        $docSet = $this->getRepository()->findBy($criteria);

        return $docSet;
    }

    /**
     * @return DocumentRepository
     */
    public function getRepository() {
        return $this->dm->getRepository('Soil\OnSiteNotificationBundle\Entity\PendingNotification');
    }

    public function serialiseNotification(PendingNotification $notification) {
        return [
            'id' => $notification->getId(),
            'agent' => $notification->getAgentURI(),
            'image' => $notification->getImage(),
            'shown_times' => $notification->getShownTimes(),
            'message' => $notification->getMessage(),
            'action' => $notification->getAction(),
            'title' => $notification->getTitle(),
            'related_link' => $notification->getRelatedLink(),
            'show_strategy' => $notification->getShowStrategy() ? $notification->getShowStrategy()->getAsArray() : []
        ];
    }

    /**
     * @param $id
     *
     * @return PendingNotification
     *
     * @throws \Doctrine\ODM\MongoDB\LockException
     */
    public function loadById($id)   {
        return $this->getRepository()->find($id);
    }

    public function strategyApply($notification, ShowStrategyInterface $strategy) {
//        $notificationTypeStorage
        return $strategy->apply($notification);
    }

} 