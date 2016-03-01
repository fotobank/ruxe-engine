<?php

namespace RuxeEngine\Plugins\WebAPI;

interface IAPIMethod
{
    public function __construct(Config $config, Request $request, User $user);

    public function process();
}