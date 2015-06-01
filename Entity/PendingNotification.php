<?php
/**
 * Created by PhpStorm.
 * User: fliak
 * Date: 31.5.15
 * Time: 9.22
 */

namespace Soil\OnSiteNotificationBundle\Entity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Soil\OnSiteNotificationBundle\Entity\ShowStrategy\ShowStrategyInterface;

/**
 * Class PendingNotification
 * @package Soil\NotificationBundle\Entity
 *
 * @ODM\Document(collection="notification_onsite")
 */
class PendingNotification implements NotificationInterface {

    /**
     * @var string
     *
     * @ODM\Id
     */
    protected $id;

    /**
     * @var string
     *
     * @ODM\String(name="agent")
     */
    protected $agentURI;

    /**
     * @var string
     * @ODM\String
     */
    protected $title;


    /**
     * @var bool
     * @ODM\Bool
     */
    protected $archive;

    /**
     * @var string
     * @ODM\String
     */
    protected $message;

    /**
     * @var string
     * @ODM\String
     */
    protected $action;




    /**
     * @var string
     * @ODM\String
     */
    protected $image;

    /**
     * @var integer
     *
     * @ODM\Int
     */
    protected $shownTimes;

    /**
     * @var ShowStrategyInterface
     * @ODM\EmbedOne
     */
    protected $showStrategy;


    /**
     * @var string
     * @ODM\String
     */
    protected $relatedLink;


    /**
     * @var \DateTime
     * @ODM\Date
     */
    protected $lastExpositionDate;


    /**
     * @var string
     * @ODM\String
     */
    protected $promiseURI;


    /**
     * @return string
     */
    public function getAgentURI()
    {
        return $this->agentURI;
    }

    /**
     * @param string $agentURI
     */
    public function setAgentURI($agentURI)
    {
        $this->agentURI = $agentURI;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return int
     */
    public function getShownTimes()
    {
        return $this->shownTimes;
    }

    /**
     * @param int $showTimes
     */
    public function setShownTimes($showTimes)
    {
        $this->shownTimes = $showTimes;
    }

    public function wasShown()  {
        $this->shownTimes++;
        $this->setLastExpositionDate(new \DateTime());

        return $this->shownTimes;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getRelatedLink()
    {
        return $this->relatedLink;
    }

    /**
     * @param string $relatedLink
     */
    public function setRelatedLink($relatedLink)
    {
        $this->relatedLink = $relatedLink;
    }

    /**
     * @return ShowStrategyInterface
     */
    public function getShowStrategy()
    {
        return $this->showStrategy;
    }

    /**
     * @param ShowStrategyInterface $showStrategy
     */
    public function setShowStrategy($showStrategy)
    {
        $this->showStrategy = $showStrategy;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return boolean
     */
    public function isArchive()
    {
        return $this->archive;
    }

    /**
     * @param boolean $archive
     */
    public function setArchive($archive)
    {
        $this->archive = $archive;
    }

    /**
     * @return \DateTime
     */
    public function getLastExpositionDate()
    {
        return $this->lastExpositionDate;
    }

    /**
     * @param \DateTime $lastExpositionDate
     */
    public function setLastExpositionDate($lastExpositionDate)
    {
        $this->lastExpositionDate = $lastExpositionDate;
    }

    /**
     * @return string
     */
    public function getPromiseURI()
    {
        return $this->promiseURI;
    }

    /**
     * @param string $promiseURI
     */
    public function setPromiseURI($promiseURI)
    {
        $this->promiseURI = $promiseURI;
    }






}