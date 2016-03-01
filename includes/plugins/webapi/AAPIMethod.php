<?php

namespace RuxeEngine\Plugins\WebAPI;

/**
 * Class AAPIMethod
 *
 * Заготовка API методов
 *
 * @author Ахрамеев Денис Викторович (contact@ahrameev.ru)
 * @link http://ahrameev.ru
 * @package RuxeEngine\Plugins\WebAPI
 */
abstract class AAPIMethod implements IAPIMethod
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var User
     */
    protected $user;

    public function __construct(Config $config, Request $request, User $user)
    {
        $this->config = $config;
        $this->request = $request;
        $this->user = $user;
    }
}
