<?php

namespace RuxeEngine\Plugins\WebAPI;

class Request
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function getLogin()
    {
        return isset($_POST["login"]) ? $_POST["login"] : "no";
    }

    public function getPassword()
    {
        return isset($_POST["password"]) ? $_POST["password"] : "no";
    }
}
