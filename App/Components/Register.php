<?php

namespace App\Components;

class Register {

    public static $errors = [];

    public static function checkName($name) {

        $pattern = '/^[a-zA-Z0-9-_]+$/';

        if(!preg_match($pattern ,$name)) {
            self::$errors[] = 'Поле имя пустое либо содержит недопустимые символы.';
        }

    }

    public static function checkEmail($email) {

        $pattern = '/^[\w.-]+@[\w.-]+\.\w+$/';

        if(!preg_match($pattern ,$email)) {
            self::$errors[] = 'Поле E-mail пустое либо содержит недопустимые символы.';
        }

    }

    public static function checkPassword($password) {

        $pattern = '/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/';

        if(!preg_match($pattern ,$password)) {
            self::$errors[] = 'Пароль не подходит. Минимум 8 символов, минимум одна заглавная буква и минимум 1 число';
        }
    }
    
    public static function checkPassword_equal($password1, $password2) {
        if($password1 != $password2) {
            self::$errors[] = 'Пароли не совпадают.';
        }
    }
    
}