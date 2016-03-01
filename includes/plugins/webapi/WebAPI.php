<?php

namespace RuxeEngine\Plugins\WebAPI;

class WebAPI
{
    protected $request;

    public function __construct()
    {

    }

    public function start()
    {
        global $Filtr;

        if (! isset($_GET["request"])) {
            Response::sendError("Некорректный запрос: отсутствует request.");
        }

        $this->request = new Request($Filtr->clear($_GET['request']));

        switch ($request) {
            case "getAdminNotifications":
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
                break;
            case "getNewToken":
                $api->checkLoginAndPasswordPOST();
                if (! isset($_POST["secret"]) || empty($_POST["secret"])) {
                    $api->sendErrorResponse("Пожалуйста, заполните поле «Случайные буквы».");
                }
                if (! $api->isAdmin($api->getLogin(), $api->getPassword()) ) {
                    $api->sendErrorResponse("Указанный пользователь не является администратором или логин/пароль не верны.");
                }

                $token = $api->generateToken($Filtr->clear($_POST['secret']));

                $conf = $api->getConf();
                $conf['token'] = $token;
                $api->setConf($conf);

                $api->sendResponse(true, ["token" => $token]);
                break;
            case "getVersion":
                $api->checkTokenPOST();
                if (! $api->isCorrectToken($_POST["token"])) {
                    $api->sendErrorResponse("Token не задан или не верен.");
                }

                $api->sendResponse(true, ["version" => $this_version]);
                break;
            default:
                $api->sendErrorResponse("Некорректный запрос: указанный request не поддерживается.");
        }
    }

    public function getAdminNotifications()
    {

    }

    public function getNewToken()
    {

    }

    public function getVersion()
    {

    }
}
