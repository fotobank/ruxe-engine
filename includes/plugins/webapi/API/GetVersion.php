<?php

namespace RuxeEngine\Plugins\WebAPI\API;

use RuxeEngine\Plugins\WebAPI\AAPIMethod;
use RuxeEngine\Plugins\WebAPI\IAPIMethod;
use RuxeEngine\Plugins\WebAPI\Response;
use RuxeEngine\Plugins\WebAPI\Token;

/**
 * Class GetVersion
 *
 * Возвращает версию установленного на сайте Ruxe Engine в JSON формате вида:
 * [
 *     "status" => "good",
 *     "version" => string
 * ]
 *
 * @author Ахрамеев Денис Викторович (contact@ahrameev.ru)
 * @link http://ahrameev.ru
 * @package RuxeEngine\Plugins\WebAPI\API
 */
class GetVersion extends AAPIMethod implements IAPIMethod
{
    public function process()
    {
        global $this_version;
        if (! isset($_POST["token"])) {
            Response::sendError("Некорректный запрос: отсутствует token.");
        }
        $token = new Token($this->config, $_POST["token"]);
        if (! $token->isCorrect()) {
            Response::sendError("Token не задан или не верен.");
        }

        Response::send(true, ["version" => $this_version]);
    }
}
