<?php

namespace App\Controllers;

use App\Components\Register;
use App\Core\View;
use App\Models\User;
use App\Components\Auth;

class UserController
{

    public function actionIndex() {
        
       if(isset($_POST['submit']) && User::findUser()) {
           
          header("Location: /admin");
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
                       
            header("Location: /user");

        } else {
            $view = new View;
            $view->errors = Register::$errors;
            $view->render('/App/views/user/register.php', $view->errors);
        }
        
    }
     
    public function actionLogout() {
        Auth::logout();
        header("Location: /user");
    }
    
}