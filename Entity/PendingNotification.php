<?php
/**
 * Created by PhpStorm.
 * User: fliak
 * Date: 31.5.15
 * Time: 9.22
 */

namespace Soil\NotificationBundle\Entity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * Class PendingNotification
 * @package Soil\NotificationBundle\Entity
 *
 * @ODM\Document(db="talaka_notification", collection="comment")
 */
class PendingNotification {

    /**
     * @var string
     *
     * @ODM\Id
     */
    protected $id;

    /**
     * @var string
     *
     * @ODM\String
     */
    protected $agentURI;

    /**
     * @var string
     * @ODM\String
     */
    protected $notification;

    /**
     * @var string
     * @ODM\String
     */
    protected $title;

    /**
     * @var string
     * @ODM\String
     */
    protected $description;


    /**
     * @var string
     * @ODM\String
     */
    protected $image;

    /**
     * @var integer
     *
     */
    protected $showTimes;

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
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * @param string $notification
     */
    public function setNotification($notification)
    {
        $this->notification = $notification;
    }




}