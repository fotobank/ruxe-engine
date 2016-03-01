<?php

namespace RuxeEngine\Plugins\WebAPI;

require_once __DIR__ . "/Token.php";
require_once __DIR__ . "/Response.php";
require_once __DIR__ . "/Config.php";
require_once __DIR__ . "/WebAPI.php";
require_once __DIR__ . "/User.php";
require_once __DIR__ . "/WebAPIException.php";
require_once __DIR__ . "/Request.php";
require_once __DIR__ . "/IAPIMethod.php";
require_once __DIR__ . "/AAPIMethod.php";
require_once __DIR__ . "/API/GetAdminNotifications.php";
require_once __DIR__ . "/API/GetVersion.php";
require_once __DIR__ . "/API/GetNewToken.php";


class WebAPI1 {


















    public function checkLoginAndPasswordPOST()
    {
        if (! isset($_POST["login"]) || ! isset($_POST["password"]) ) {
            $this->sendErrorResponse("Некорректный запрос: отсутствует login или password в POST.");
        }
    }

    public function checkTokenPOST()
    {
        if (! isset($_POST["token"])) {
            $this->sendErrorResponse("Некорректный запрос: отсутствует token.");
        }
    }
}

if ( isset($_GET["action"]) && ($_GET["action"] == "webapi") ) {
    $webAPI = new WebAPI();
    $webAPI->start();
}
