<?php

namespace RuxeEngine\Plugins\WebAPI\API;

use RuxeEngine\Plugins\WebAPI\AAPIMethod;
use RuxeEngine\Plugins\WebAPI\IAPIMethod;
use RuxeEngine\Plugins\WebAPI\Response;
use RuxeEngine\Plugins\WebAPI\Token;
use RuxeEngine\Plugins\WebAPI\WebAPIException;

/**
 * Class GetNewToken
 *
 * Генерирует новый токен, сохраняет его и возвращает JSON результат вида
 * [
 *     "status" => "good",
 *     "token" => string
 * ]
 *
 * @author Ахрамеев Денис Викторович (contact@ahrameev.ru)
 * @link http://ahrameev.ru
 * @package RuxeEngine\Plugins\WebAPI\API
 */
class GetNewToken extends AAPIMethod implements IAPIMethod
{
    public function process()
    {
        global $Filtr;

        if (! isset($_POST["login"]) || ! isset($_POST["password"]) ) {
            Response::sendError("Некорректный запрос: отсутствует login или password в POST.");
        }
        if (! isset($_POST["secret"]) || empty($_POST["secret"])) {
            Response::sendError("Пожалуйста, заполните поле «Случайные буквы».");
        }
        if (! $this->user->isAdmin($this->request->getLogin(), $this->request->getPassword()) ) {
            Response::sendError("Указанный пользователь не является администратором или логин/пароль не верны.");
        }

        try {
            $token = Token::generate($this->request->getLogin(), $Filtr->clear($_POST['secret']));
            $conf = $this->config->get();
            $conf['token'] = $token;
            $this->config->set($conf);

            Response::send(true, ["token" => $token]);
        } catch (WebAPIException $e) {
            Response::sendError($e->getMessage());
        }
    }
}
