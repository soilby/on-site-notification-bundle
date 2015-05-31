<?php
/**
 * Created by PhpStorm.
 * User: fliak
 * Date: 31.5.15
 * Time: 9.52
 */

namespace Soil\OnSiteNotificationBundle\Controller;


use Symfony\Component\HttpFoundation\Request;

class PendingNotificationController {

    public function getAgentNotificationAction(Request $request)    {
        $agent = $request->get('agent_uri');

        var_dump($agent);

        exit();
    }

    public function setNotificationShownAction(Request $request)   {

    }
}