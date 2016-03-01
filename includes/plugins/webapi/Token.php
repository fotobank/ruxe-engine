<?php

namespace RuxeEngine\Plugins\WebAPI;

/**
 * Class Token
 *
 * @author Ахрамеев Денис Викторович (contact@ahrameev.ru)
 * @link http://ahrameev.ru
 * @package RuxeEngine\Plugins\WebAPI
 */
class Token
{
    /**
     * @var string
     */
    protected $token;

    /**
     * @var Config
     */
    protected $config;

    /**
     * Token constructor.
     * @param Config $config
     * @param string $token
     */
    public function __construct(Config $config, $token)
    {
        $this->config = $config;
        $this->token = $token;
    }

    /**
     * @return bool
     */
    public function isCorrect()
    {
        if (empty($this->config->get()["token"]))
            return false;

        return $this->config->get()["token"] === $this->token;
    }

    /**
     * @param string $login
     * @param string $secret
     * @return string
     * @throws WebAPIException в случае, если пользователь не найден
     */
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
