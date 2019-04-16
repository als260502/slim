<?php
/**
 * Created by PhpStorm.
 * User: Andre
 * Date: 16/04/2019
 * Time: 15:01
 */

namespace App\Auth;


use App\Model\User;

class Auth
{

    public function user()
    {

        return User::find(@$_SESSION['user']);

    }

    public function check()
    {
        return isset($_SESSION['user']);
    }

    public function attempt($email, $password)
    {
        //grab the user email

        $user = User::where('email', $email)->first();

        if(!$user)return false;

        // verify password for that user
        if(password_verify($password, $user->password)) {

            $_SESSION['user'] = $user->id;
            return true;
        }

         return false;

    }

    public function logout(){
        unset($_SESSION['user']);
    }

}