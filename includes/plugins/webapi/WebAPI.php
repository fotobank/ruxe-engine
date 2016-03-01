<?php

namespace RuxeEngine\Plugins\WebAPI;

/**
 * Class WebAPI
 *
 * @author Ахрамеев Денис Викторович (contact@ahrameev.ru)
 * @link http://ahrameev.ru
 * @package RuxeEngine\Plugins\WebAPI
 */
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
    }
}
