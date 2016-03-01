<?php

/**
 * Плагин WebAPI для Ruxe Engine
 *
 * Требования: Ruxe Engine 1.8+, PHP 5.4+, поддержка JSON, mbstring
 * Автор: Ахрамеев Денис Викторович
 * Сайт: http://ahrameev.ru
 */

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
// ДЛЯ РАЗРАБОТЧИКОВ: API методы. Т.к. в Ruxe Engine 1 нет автозагрузчика,
// используемые файлы классов нужно подключать самому здесь:
require_once __DIR__ . "/API/GetAdminNotifications.php";
require_once __DIR__ . "/API/GetVersion.php";
require_once __DIR__ . "/API/GetNewToken.php";

if ( isset($_GET["action"]) && ($_GET["action"] == "webapi") ) {
    $webAPI = new WebAPI();
    $webAPI->start();
}
