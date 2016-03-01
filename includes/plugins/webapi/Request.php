<?php

namespace RuxeEngine\Plugins\WebAPI;

/**
 * Class Request
 *
 * @author Ахрамеев Денис Викторович (contact@ahrameev.ru)
 * @link http://ahrameev.ru
 * @package RuxeEngine\Plugins\WebAPI
 */
class Request
{
    /**
     * @var string
     */
    protected $query;

    /**
     * Request constructor.
     * @param string $query имя запрашиваемого API метода
     */
    public function __construct($query)
    {
        global $Filtr;

        $this->query = $Filtr->clear($query);
    }

    /**
     * Возвращает логин из POST
     *
     * @return string
     */
    public function getLogin()
    {
        return isset($_POST["login"]) ? $_POST["login"] : "no";
    }

    /**
     * Возвращает пароль из POST
     *
     * @return string
     */
    public function getPassword()
    {
        return isset($_POST["password"]) ? $_POST["password"] : "no";
    }

    /**
     * Возвращает очищенное имя API метода либо false, в случае ошибки
     *
     * @return string|false
     */
    public function getAPIClassName()
    {
        if (! preg_match("~^([a-z]+)$~i", $this->query))
            return false;

        return $this->query;
    }
}
