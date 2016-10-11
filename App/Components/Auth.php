<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04.10.2016
 * Time: 19:11
 */

namespace App\Components;


class Auth
{

    

    public static function login($name) {

        $_SESSION['user_name'] = $name;
        $_SESSION['is_logged'] = true;
    }

    public static function logout() {

        unset($_SESSION['user_name']);
        $_SESSION['is_logged'] = false;
    }


}