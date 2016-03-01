<?php

namespace RuxeEngine\Plugins\WebAPI;

class Request
{
    protected $query;

    public function __construct($query)
    {
        global $Filtr;

        $this->query = $Filtr->clear($query);
    }

    public function getLogin()
    {
        return isset($_POST["login"]) ? $_POST["login"] : "no";
    }

    public function getPassword()
    {
        return isset($_POST["password"]) ? $_POST["password"] : "no";
    }

    public function getAPIClassName()
    {
        if (! preg_match("~^([a-z]+)$~i", $this->query))
            return false;

        return $this->query;
    }
}
