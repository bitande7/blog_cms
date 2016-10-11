<?php

namespace App\Models;

use App\Components\Auth;

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
        $this->password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        self::insert();

       

//        $last_id = Db::getInstance();
//        $id = $last_id::$db->lastInsertId();

    }

    public static function findUser() {

            $query = "SELECT user.email, user.name, user.password FROM ". static::TABLE. " WHERE email = :email";
            $user = Db::getInstance()->queryOne($query, static::class, [':email' => $_POST['email']]);

            if( password_verify ( $_POST['password'] ,  $user->password ) ) {

                Auth::login($user->name);

                return true;
            } else {
                return false;
            }

        

    }

}

