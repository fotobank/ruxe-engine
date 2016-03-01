<?php

namespace RuxeEngine\Plugins\WebAPI;

/**
 * Class User
 *
 * @author Ахрамеев Денис Викторович (contact@ahrameev.ru)
 * @link http://ahrameev.ru
 * @package RuxeEngine\Plugins\WebAPI
 */
class User
{
    /**
     * @param string $login
     * @param string $password не хэш, а именно пароль
     * @return bool
     */
    public function isAdmin($login, $password)
    {
        global $cms_root, $Filtr;

        $users = file($cms_root . "/conf/users/users.dat");
        foreach ($users as $user) {
            $cols = explode("|", $user);
            //1 - hash
            //22 - salt
            //4 - admin или нет
            //18 - login
            if ( $Filtr->tolower($cols[18]) == $Filtr->tolower($login) ) {
                if ( md5(md5($password) . $cols[22]) === $cols[1] ) {
                    return $cols[4] == "admin";
                }
                return false;
            }
        }

        return false;
    }
}
