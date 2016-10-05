<?php

namespace App\Models;

class User extends ActiveRecord{

    const TABLE = 'user';

    public $id;
    public $name;
    public $email;
    public $password;
    public $avatar = 'img/avatars/noavatar.jpg';
    public $role = 'user';


    public function registerUser() {
                
        $this->name = $_POST['name'];
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];

        self::insert();

        header("Location: /user");

//        $last_id = Db::getInstance();
//        $id = $last_id::$db->lastInsertId();

    }

    public static function findUser() {
        $query = "SELECT user.email, user.password FROM ". static::TABLE. " WHERE email = :email AND password = :password";
        return Db::getInstance()->queryOne($query, static::class, [':email' => $_POST['email'], ':password' => $_POST['password']]);
    }

}

