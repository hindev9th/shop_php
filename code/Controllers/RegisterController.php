<?php

namespace code\Controllers;

use code\Models\User;

class RegisterController
{

    private static ?RegisterController $registerController = null;
    private function __construct()
    {

    }

    public static function gI(): RegisterController
    {
        if (self::$registerController == null) {
            self::$registerController = new RegisterController();
        }
        return self::$registerController;
    }

    public function index()
    {
        return require_once 'resources/views/frontend/register.php';
    }

    public function register()
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $userModel = new User();
        $user = $userModel->register($firstname,$lastname,$email,$password);
        if ($user === 200){
            redirect('/');
        }
        redirectBack();
    }
}