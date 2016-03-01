<?php

namespace RuxeEngine\Plugins\WebAPI\API;

use RuxeEngine\Plugins\WebAPI\AAPIMethod;
use RuxeEngine\Plugins\WebAPI\IAPIMethod;

class GetAdminNotifications extends AAPIMethod implements IAPIMethod
{
    public function process()
    {
        $api->checkTokenPOST();
        if (! $api->isCorrectToken($_POST["token"])) {
            $api->sendErrorResponse("Token не задан или не верен.");
        }

        $notifications = [];
        $rpanelMessages = file($cms_root . "/conf/new_messages.dat");
        foreach ($rpanelMessages as $rpanelMessage) {
            $cols = explode("|", $rpanelMessage);
            $notifications[] = [
                "title" => $cols[0],
                "warning" => $cols[1] != "yes",
                "content" => preg_replace("~<br><input ([^>]+)> <input ([^>]+)><br>~uis", "", $cols[2])
            ];
        }

        $api->sendResponse(true, ["notifications" => array_reverse($notifications)]);
    }
}
