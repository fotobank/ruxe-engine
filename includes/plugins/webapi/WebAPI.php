<?php

namespace RuxeEngine\Plugins\WebAPI;

class WebAPI
{
    public function start()
    {
        if (! isset($_GET["request"])) {
            Response::sendError("Некорректный запрос: отсутствует request.");
        }

        $request = new Request($_GET['request']);
        if (! $className = $request->getAPIClassName()) {
            Response::sendError("Некорректный запрос: указанный request не поддерживается.");
        }

        $class = "\\RuxeEngine\\Plugins\\WebAPI\\API\\{$className}";

        if (! class_exists($class)) {
            Response::sendError("Некорректный запрос: указанный request не поддерживается.");
        }

        /** @var IAPIMethod $method */
        $method = new $class(new Config(), $request, new User());
        $method->process();

/*
        switch ($request) {
            case "getAdminNotifications":

                break;
            case "getNewToken":

                break;
            case "getVersion":
                $api->checkTokenPOST();
                if (! $api->isCorrectToken($_POST["token"])) {
                    $api->sendErrorResponse("Token не задан или не верен.");
                }

                $api->sendResponse(true, ["version" => $this_version]);
                break;
            default:

        }*/
    }
}
