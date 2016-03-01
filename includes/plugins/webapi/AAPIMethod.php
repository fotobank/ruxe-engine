<?php

namespace RuxeEngine\Plugins\WebAPI;

abstract class AAPIMethod implements IAPIMethod
{
    protected $config;

    protected $request;

    protected $user;

    public function __construct(Config $config, Request $request, User $user)
    {
        $this->config = $config;
        $this->request = $request;
        $this->user = $user;
    }
}
