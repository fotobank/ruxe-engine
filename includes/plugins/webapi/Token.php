<?php

namespace RuxeEngine\Plugins\WebAPI;

class Token
{
    protected $token;

    protected $config;

    public function __construct(Config $config, $token)
    {
        $this->config = $config;
        $this->token = $token;
    }

    public function isCorrect()
    {
        if (empty($this->config->get()["token"]))
            return false;

        return $this->config->get()["token"] === $this->token;
    }

    public static function generate($login, $secret)
    {
        global $cms_root, $Filtr;

        $users = file($cms_root . "/conf/users/users.dat");
        foreach ($users as $user) {
            $cols = explode("|", $user);
            //1 - hash
            //22 - salt
            //4 - admin или нет
            //18 - login
            if ( $Filtr->tolower($login) == $Filtr->tolower($cols[18]) ) {
                $salt = $cols[22];
                return md5( md5(rand(0, time())) . "{$salt}{$salt}{$secret}{$secret}" );
            }
        }

        throw new WebAPIException("Не удалось найти пользователя при попытке сгенерировать токен. Пожалуйста, обратитесь по contact@ahrameev.ru.");
    }
}
