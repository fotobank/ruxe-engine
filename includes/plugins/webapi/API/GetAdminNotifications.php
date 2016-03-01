<?php

namespace RuxeEngine\Plugins\WebAPI\API;

use RuxeEngine\Plugins\WebAPI\AAPIMethod;
use RuxeEngine\Plugins\WebAPI\IAPIMethod;
use RuxeEngine\Plugins\WebAPI\Response;
use RuxeEngine\Plugins\WebAPI\Token;

class GetAdminNotifications extends AAPIMethod implements IAPIMethod
{
    public function process()
    {
        global $cms_root;

        if (! isset($_POST["token"])) {
            Response::sendError("Некорректный запрос: отсутствует token.");
        }
        $token = new Token($this->config, $_POST["token"]);
        if (! $token->isCorrect()) {
            Response::sendError("Token не задан или не верен.");
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

        Response::send(true, ["notifications" => array_reverse($notifications)]);
    }
}
