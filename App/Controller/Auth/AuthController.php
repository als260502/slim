<?php

namespace App\Controller\Auth;

use App\Controller\BaseController;

class AuthController extends BaseController
{

    public function getSignUp($request, $response)
    {

        $this->view->render($response, 'auth/signup.phtml');

    }

    public function postSignUp(){
        
    }

}