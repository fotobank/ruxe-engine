<?php

namespace RuxeEngine\Plugins\WebAPI;

/**
 * Interface IAPIMethod
 *
 * Интерфейс API методов
 *
 * @author Ахрамеев Денис Викторович (contact@ahrameev.ru)
 * @link http://ahrameev.ru
 * @package RuxeEngine\Plugins\WebAPI
 */
interface IAPIMethod
{
    /**
     * IAPIMethod constructor.
     * @param Config $config
     * @param Request $request
     * @param User $user
     */
    public function __construct(Config $config, Request $request, User $user);

    /**
     * Логика, которая будет использована у API метода при его вызове
     */
    public function process();
}
