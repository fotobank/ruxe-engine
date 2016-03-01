<?php

namespace RuxeEngine\Plugins\WebAPI;

class User
{
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
