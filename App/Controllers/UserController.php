<?php

namespace App\Controllers;

use App\Components\Register;
use App\Core\View;
use App\Models\User;

class UserController
{

    public function actionIndex() {
       
        $user = User::findUser();

       if( !empty($user) ) {
           header("Location: /");
       } else {
           $view = new View;
           $view->error = !empty($_POST) ? 'Логин или пароль введены неверно' : ''; 
           $view->render('/App/views/user/login.php', $view->error);
       }
        
    }

    public function actionRegister() {

        if(!empty($_POST)) {
            Register::checkName($_POST['name']);
            Register::checkEmail($_POST['email']);
            Register::checkPassword($_POST['password']);
            Register::checkPassword_equal($_POST['password'], $_POST['password2']);
        }

        if(!empty($_POST) && empty(Register::$errors) ) {

            $user = new User();
            $user->registerUser();

        } else {
            $view = new View;
            $view->errors = Register::$errors;
            $view->render('/App/views/user/register.php', $view->errors);
        }
        
    }
    
}